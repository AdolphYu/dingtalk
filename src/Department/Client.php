<?php

/*
 * This file is part of the mingyoung/dingtalk.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyDingTalk\Department;

use EasyDingTalk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取子部门 ID 列表
     *
     * @param string $id 部门ID
     *
     * @return mixed
     */
    public function getSubDepartmentIds($id)
    {
        return $this->client->post('topapi/v2/department/listsubid', [
            'dept_id' => $id
        ]);
    }

    /**
     * 获取部门列表
     *
     * @param bool   $isFetchChild
     * @param string $id
     * @param string $lang
     *
     * @return mixed
     */
    public function list($id = null, $lang = null)
    {
        return $this->client->POST('topapi/v2/department/listsub', [
            'dept_id' => $id, 'language' => $lang
        ]);
    }

    /**
     * 获取部门详情
     *
     * @param string $id
     * @param string $lang
     *
     * @return mixed
     */
    public function get($id, $lang = null)
    {
        return $this->client->post('topapi/v2/department/get', [
            'dept_id' => $id, 'language' => $lang
        ]);
    }

    /**
     * 查询部门的所有上级父部门路径
     *
     * @param string $id
     *
     * @return mixed
     */
    public function getParentsById($id)
    {
        return $this->client->post('topapi/v2/department/listparentbydept', [
            'dept_id' => $id
        ]);
    }

    /**
     * 查询指定用户的所有上级父部门路径
     *
     * @param string $userId
     *
     * @return mixed
     */
    public function getParentsByUserId($userId)
    {
        return $this->client->get('topapi/v2/department/listparentbyuser', [
            'userid' => $userId
        ]);
    }

    /**
     * 创建部门
     *
     * @param array $params
     *
     * @return mixed
     */
    public function create(array $params)
    {
        return $this->client->postJson('topapi/v2/department/create', $params);
    }

    /**
     * 更新部门
     *
     * @param string $id
     * @param array  $params
     *
     * @return mixed
     */
    public function update(array $params)
    {
        return $this->client->postJson('topapi/v2/department/update', $params);
    }

    /**
     * 删除部门
     *
     * @param string $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        return $this->client->post('topapi/v2/department/delete', [
            'dept_id' => $id
        ]);
    }
}
