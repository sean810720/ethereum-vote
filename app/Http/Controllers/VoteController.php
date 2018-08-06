<?php

namespace App\Http\Controllers;

use App\Repositories\EthereumRepository as Ethereum;

/**
 * 投票範例
 */

class VoteController extends Controller
{
    // 首頁
    public function index()
    {
        return view('vote.index')->with(['title' => '以太坊投票區']);
    }

    // 取得項目列表
    public function items()
    {
        $item_list = [
            ['name' => '藍藍路', 'rate' => 0],
            ['name' => '肯基基', 'rate' => 0],
            ['name' => '摩斯', 'rate' => 0],
            ['name' => '吉野家', 'rate' => 0],
            ['name' => '三商巧福', 'rate' => 0],
        ];

        foreach ($item_list as $k => $v) {
            $item_list[$k]['rate'] = $this->get_vote_count($k);
        }

        return response()->json($item_list);
    }

    // 投票
    public function vote($item_key = 0)
    {
        $result = [
            'status' => false,
            'msg'    => '',
        ];

        $result['msg'] = Ethereum::transaction(

            // 呼叫者錢包位址
            '0xAc7833EF2E9e2a342fB1864C2d86e92E07F8E515',

            // 被呼叫的合約或錢包位址
            '0x65be2c853331ef412f079576176b3deb5a20cbf9',

            // 要送的錢 (單位:Wei, 合約交易帶0)
            0,

            // 呼叫合約方法名稱
            'vote',

            // 呼叫合約方法參數 [型態 => 值, 型態 => 值]
            [
                'bytes32' => $item_key,
            ]
        );

        $result['status'] = true;
        return response()->json($result);
    }

    // 取得投票結果
    private function get_vote_count($item_key = 0)
    {
        return hexdec(
            Ethereum::call(

                // 呼叫者錢包位址
                '0xAc7833EF2E9e2a342fB1864C2d86e92E07F8E515',

                // 被呼叫的合約或錢包位址
                '0x65be2c853331ef412f079576176b3deb5a20cbf9',

                // 要送的錢 (單位:Wei, 合約交易帶0)
                0,

                // 呼叫合約方法名稱
                'item',

                // 呼叫合約方法參數 [型態 => 值, 型態 => 值]
                [
                    'bytes32' => $item_key,
                ]
            )
        );
    }
}
