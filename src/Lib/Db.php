<?php
/**
 * This file is part of workerman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author    walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link      http://www.workerman.net/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace WangGe\Lib;

/**
 * 数据库类
 */
class Db
{
    /**
     * 实例数组
     *
     * @var array
     */
    public static $config = array();
    protected static $instance = array();
    /**
     * 获取实例
     *
     * @param string $config_name
     * @return DbConnection
     * @throws Exception
     */
    public static function instance($config_name)
    {
        if (empty(self::$instance[$config_name])) {
            $config = self::$config[$config_name];
            self::$instance[$config_name] = new \Beanbun\Lib\DbConnection($config);
        }
        return self::$instance[$config_name];
    }
    /**
     * 关闭数据库实例
     *
     * @param string $config_name
     */
    public static function close($config_name)
    {
        if (isset(self::$instance[$config_name])) {
            self::$instance[$config_name]->closeConnection();
            self::$instance[$config_name] = null;
        }
    }
    /**
     * 关闭所有数据库实例
     */
    public static function closeAll()
    {
        foreach (self::$instance as $connection) {
            $connection->closeConnection();
        }
        self::$instance = array();
    }
}