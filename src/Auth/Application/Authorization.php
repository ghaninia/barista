<?php

namespace Src\Auth\Application;

use Src\Auth\Application\Exceptions\MethodPolicyNotFound;
use Src\Auth\Application\Exceptions\PolicyNotFoundException;
use Src\Common\Domain\Exceptions\UnauthorizedUserException;
use Src\Common\Domain\PermissionInterface;
use Src\Common\Domain\PolicyInterface;

class Authorization
{
    private PolicyInterface $policy;

    /**
     * @var array<int, PermissionInterface>
     */
    private array $abilities;

    /**
     * @var bool $exact
     */
    private bool $exact = false;

    /**
     * @var Authorization $instance
     */
    private static Authorization $instance;


    private function __construct() {}

    /**
     * @return Authorization
     */
    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * @param string $policyClass
     * @return $this
     */
    public function setPolicy(string $policyClass)
    {
        if (!class_exists($policyClass)) {
            throw new PolicyNotFoundException();
        }

        $this->policy = new $policyClass;
        return $this;
    }

    /**
     * @return PolicyInterface
     */
    public function getPolicy()
    {
        return $this->policy;
    }

    /**
     * @param PermissionInterface|array $abilities
     * @return $this
     */
    public function setAbilities(PermissionInterface|array $abilities)
    {
        $this->abilities = is_array($abilities)? $abilities: [$abilities];
        return $this;
    }

    /**
     * @return array
     */
    public function getAbilities()
    {
        return $this->abilities;
    }

    /**
     * @param bool $exact
     * @return $this
     */
    public function setExact(bool $exact)
    {
        $this->exact = $exact;
        return $this;
    }

    /**
     * @return bool
     */
    public function getExact()
    {
        return $this->exact;
    }


    /**
     * @return true
     * @throws UnauthorizedUserException
     */
    final public function execute()
    {
        $results = [];
        $mustBeExact = $this->getExact();


        foreach ($this->abilities as $ability) {
            $mapper = $this->policy->mapper();

            /**
             * find method name by permission token
             */
            foreach ($mapper as $methodName => $permission) {
                if ($permission === $ability) {
                    $method = $methodName;
                }
            }


            if (isset($method) && method_exists($this->policy, $method)) {
                $results[] = $this->policy->{$method}();
            } else {
                throw new MethodPolicyNotFound();
            }
        }


        $result = $mustBeExact?
            !in_array(false, $results):
            in_array(true, $results);

        return $result ? true : throw new UnauthorizedUserException();
    }

}
