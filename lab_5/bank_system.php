<?php
interface AccountInterface {
    function deposit($amount);
    function withdraw($amount);
    function getBalance();
}

class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0;
    protected $balance;
    protected $currency;

    public function __construct($initialBalance, $currency = 'USD') {
        if ($initialBalance < self::MIN_BALANCE) {
            throw new Exception("Початковий баланс не може бути менше" . self::MIN_BALANCE);
    }
        $this->balance = $initialBalance;
        $this->currency = $currency;
    }

    public function deposit($amount)
    {
        if ($amount <= 0) {
            throw new Exception("Сума для поповнення повинна бути більше нуля.");
        }
        $this->balance += $amount;
    }

    public function withdraw($amount){
        if ($amount <= 0) {
            throw new Exception("Сума для зняття повинна бути більше нуля.");
        }
        if ($amount > $this->balance) {
            throw new Exception("Недостатньо коштів.");
        }
        $this->balance -= $amount;
    }

    public function getBalance(){
        return $this->balance;
    }
}

class SavingsAccount extends BankAccount {
    public static $interestRate = 0.05;

    public function applyInterest(){
        $interest = $this->balance * self::$interestRate;
        $this->balance += $interest;
    }
}