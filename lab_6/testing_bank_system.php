<?php
require 'bank_system.php';
try {
    $bankAccount = new BankAccount(100);
    echo "Банківський рахунок створено. Баланс: " . $bankAccount->getBalance() . "<br>";

    $bankAccount->deposit(200);
    echo "Після поповнення: " . $bankAccount->getBalance() . "<br>";

    $bankAccount->withdraw(50);
    echo "Після зняття: " . $bankAccount->getBalance() . "<br>";

    $bankAccount->withdraw(-50);
    echo "Після зняття: " . $bankAccount->getBalance() . "<br>";
}catch (Exception $e){
    echo $e->getMessage()."<br>";
}

try{
    $savingsAccount = new SavingsAccount(10000);
    echo "Накопичувальний рахунок створено. Баланс: " . $savingsAccount->getBalance() . "<br>";

    $savingsAccount->applyInterest();
    echo "Після нарахування відсотків: " . $savingsAccount->getBalance() . "<br>";

    $savingsAccount->deposit(-500);
    echo "Після поповнення: " . $savingsAccount->getBalance() . "<br>";


}catch (Exception $e){
    echo $e->getMessage()."<br>";
}

try{
    $bankAccount_2 = new BankAccount(1000);
    echo "Банківський рахунок створено. Баланс: " . $bankAccount_2->getBalance() . "<br>";

    $bankAccount_2->withdraw(10000);
    echo "Після зняття: " . $bankAccount_2->getBalance() . "<br>";

}catch (Exception $e){
    echo $e->getMessage()."<br>";
}