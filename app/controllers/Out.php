<?php

namespace app\controllers;

use Phalcon\Mvc\Controller;

class Out extends Controller
{

    public function index()
    {
        $cname = $this->request->get('cname', 'string', 'public');
        $pid = $this->request->get('pid', 'string', 0);
        $type = $this->request->get('type', 'string', 'json');
        $token = $this->request->get('token');
        $data = [
            'cname' => $cname,
            'pid' => explode('.', $pid),
            'type' => $type,
            'data' => array_merge($this->request->getQuery(), $this->request->getPost()),
            'token' => $token,
            'ip' => $this->request->getClientAddress()
        ];
        unset($data['get']['_url']);

        $va = new \app\validation\Out();
        if (!$va->check($data)) {
            return \pconfig\Output::geshi($this->typedata([
                'error' => 1,
                'message' => $va->getMessage()
            ], $type), $type);
        }
        $data2 = $this->pid2data($data['pid']);
        return \pconfig\Output::geshi($this->typedata([
            'error' => 0,
            'data' => $data2,
            'message' => '获取成功!'
        ], $type), $type);
    }
    /**
     * 类型的数据处理
     * @param type $data
     * @param type $type
     */
    private function typedata($data, $type)
    {
        if ($data['error'] && $type == 'ini') {
            return [
                'sys' => $data
            ];
        }
        return $data;

    }


    private function pid2data(array $pids)
    {

        if (count($pids) == 1) {
            $d2 = \pconfig\Project::get4id($pids[0]);
            return $d2;
        }
        $data = [];
        foreach ($pids as $pid) {
            $d2 = \pconfig\Project::get4id($pid);
            if (is_array($d2)) {
                $data = array_merge_recursive($data, $d2);
            } else {
                $data[] = $d2;
            }

        }
        return $data;
    }

}
