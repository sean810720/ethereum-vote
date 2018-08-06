pragma solidity ^0.4.22;


contract Vote
{
  bytes32[] itemList;
  mapping (bytes32 => uint8) voteContent;

  // 初始化
  constructor(bytes32[] items) public
  {
    itemList = items;
  }

  // 投票
  function vote(bytes32 item) public
  {
    voteContent[item] += 1;
  }

  // 取得項目投票結果
  function item(bytes32 item) view public returns(uint8)
  {
    return voteContent[item];
  }
}
