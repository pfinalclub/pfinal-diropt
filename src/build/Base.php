<?php
/**
 * Created by PhpStorm.
 * User: 南丞
 * Date: 2019/2/21
 * Time: 17:45
 *
 *
 *                      _ooOoo_
 *                     o8888888o
 *                     88" . "88
 *                     (| ^_^ |)
 *                     O\  =  /O
 *                  ____/`---'\____
 *                .'  \\|     |//  `.
 *               /  \\|||  :  |||//  \
 *              /  _||||| -:- |||||-  \
 *              |   | \\\  -  /// |   |
 *              | \_|  ''\---/''  |   |
 *              \  .-\__  `-`  ___/-. /
 *            ___`. .'  /--.--\  `. . ___
 *          ."" '<  `.___\_<|>_/___.'  >'"".
 *        | | :  `- \`.;`\ _ /`;.`/ - ` : | |
 *        \  \ `-.   \_ __\ /__ _/   .-` /  /
 *  ========`-.____`-.___\_____/___.-`____.-'========
 *                       `=---='
 *  ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
 *           佛祖保佑       永无BUG     永不修改
 *
 */

namespace pf\diropt\build;

class Base
{
    /**
     * 创建目录
     * @param $dir
     * @param int $auth
     * @return bool
     */
    public function create($dir, $auth = 0755)
    {
        if (!empty($dir)) {
            if (file_exists($dir)) die('directory already exists');
            return is_dir($dir) or mkdir($dir, $auth, true);
        } else {
            die('Parameter error');
        }
    }

    /**
     * 遍历目录
     * @param $dir
     * @return array
     */
    public function tree($dir)
    {
        $list = [];
        if (empty($dir)) return $list;
        if (!file_exists($dir)) die('directory does not exist');
        foreach (glob($dir . '/*') as $id => $v) {
            $info = pathinfo($v);
            $list[$id]['path'] = $v;
            $list[$id]['type'] = filetype($v);
            $list[$id]['dirname'] = $info['dirname'];
            $list[$id]['basename'] = $info['basename'];
            $list[$id]['filename'] = $info['filename'];
            $list[$id]['extension'] = isset($info['extension']) ? $info['extension'] : '';
            $list[$id]['filemtime'] = filemtime($v);
            $list[$id]['fileatime'] = fileatime($v);
            $list[$id]['size'] = is_file($v) ? filesize($v) : $this->size($v);
            $list[$id]['iswrite'] = is_writeable($v);
            $list[$id]['isread'] = is_readable($v);
        }
        return $list;
    }
}