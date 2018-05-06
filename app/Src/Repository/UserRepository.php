<?php

namespace App\Src\Repository;

use App\Src\Model\UserModel;
use Illuminate\Hashing\BcryptHasher;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FormRepository
 * @package namespace App\Repository;
 */
class UserRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserModel::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * 校验密码
     * @param $password
     * @param $HasherPassword
     * @return mixed
     */
    public function checkPassword($password, $HasherPassword)
    {
        return app(BcryptHasher::class)->check($password, $HasherPassword);
    }

    /**
     * 设置密码
     * @param $password
     * @return string
     */
    public function getPassword($password)
    {
        return bcrypt($password);
    }

    /**
     * @param $mobile 手机号码
     * @return mixed
     */
    public function getUser($mobile)
    {
        return $this->findWhere(['phone' => $mobile])->first();
    }
}