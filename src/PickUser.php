<?php

namespace Yosmy\Virtual;

/**
 * @di\service()
 */
class PickUser
{
    /**
     * @var ManageUserCollection
     */
    private $manageCollection;

    /**
     * @param ManageUserCollection $manageCollection
     */
    public function __construct(ManageUserCollection $manageCollection)
    {
        $this->manageCollection = $manageCollection;
    }

    /**
     * @param string $id
     *
     * @return User
     *
     * @throws NonexistentUserException
     */
    public function pick(
        string $id
    ) {
        /** @var User $user */
        $user = $this->manageCollection->findOne([
            '_id' => $id
        ]);

        if ($user === null) {
            throw new NonexistentUserException();
        }

        return $user;
    }
}
