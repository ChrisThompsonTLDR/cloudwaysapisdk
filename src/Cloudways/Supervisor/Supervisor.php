<?php
namespace Cloudways\Supervisor;

use Exception;

/**
* Class to handle Supervisord
*/
class Supervisor extends \Cloudways\Base
{
    /*
    * Get Supervisord queues
    */
    public function list($serverid, $appid)
    {
        try {
            $url = "/app/supervisor";
            $param = [
                'server_id' => $serverid,
                'app_id'    => $appid,
            ];
            $response = $this->callCloudwaysAPI("get", $url, $param);
        } catch (Exception $e) {
            $response = array("error" => $e->getMessage());
        }

        return $response;
    }

    /*
    * Restart Supervisord queue
    */
    public function restart($serverid, $appid, $queueid)
    {
        try {
            $url = "/supervisor/queue/restart";
            $param = [
                'server_id' => $serverid,
                'app_id'    => $appid,
                'queue_id'  => $queueid,
            ];
            $response = $this->callCloudwaysAPI("post", $url, $param);
        } catch (Exception $e) {
            $response = array("error" => $e->getMessage());
        }

        return $response;
    }
}
