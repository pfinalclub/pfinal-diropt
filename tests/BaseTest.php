<?php

/**
 * Created by PhpStorm.
 * User: 南丞
 * Date: 2019/2/22
 * Time: 17:11
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

use pf\diropt\Diropt;

class BaseTest extends \PHPUnit\Framework\TestCase
{
    public function testTree()
    {
        $this->assertInternalType('array', Diropt::tree('.'));
    }

    public function testSize()
    {
        $this->assertInternalType('int', Diropt::size('.'));
    }

    public function testCreate()
    {
        $this->assertTrue(Diropt::create('tests/temp'));
    }

    public function testDel()
    {
        $this->assertTrue(Diropt::del('tests/temp'));
    }

    public function testCopy()
    {
        $this->assertTrue(Diropt::copy('src', 'tests/src'));
    }

    public function testCopyFile()
    {
        $this->assertTrue(Diropt::copyFile('README.md', 'tests/README.md'));
    }

    public function testMoveFile()
    {
        $this->assertTrue(Diropt::moveFile('tests/README.md', 'tests/src'));
    }

    public function testMove()
    {
        $this->assertTrue(Diropt::move('tests/src', 'tests/a'));
    }

    public function testDelTemp()
    {
        $this->assertTrue(Diropt::del('tests/a'));
    }
}
