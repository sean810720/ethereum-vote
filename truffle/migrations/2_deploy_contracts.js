/*
var SimpleStorage = artifacts.require("./SimpleStorage.sol");

module.exports = function(deployer) {
  deployer.deploy(SimpleStorage);
};
*/

var Vote = artifacts.require('./Vote.sol');

module.exports = function(deployer) {
    deployer.deploy(Vote, ['藍藍路','肯基基','摩斯','吉野家','三商巧福']);
};
