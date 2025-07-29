<?php


class BankAccount{
    //    "123456" , 50000 , "Saiful"
    public $accountNumber ;
    private $balance  ;
    protected $ownerNane;

    public function __construct($accountNumber , $balance , $ownerNane)
    {
        $this->accountNumber = $accountNumber ;
        $this->balance = $balance ;
        $this->ownerNane = $ownerNane ;
    }

    // for getting balance
    public function getBalanace()
    {
       return $this->balance ;
    }

    public function deposit($amount){

        $this->balance += $amount ;
        echo "Deposited $amount টাকা | নতুন ব্যালেঞ্চ ঃ {$this->balance} \n";

    }

    public function withdraw($amount){
        if($amount > 0 && $amount <=$this->balance){
            $this->balance -= $amount ;
            echo "Wthdraw $amount টাকা | নতুন ব্যালেঞ্চ ঃ {$this->balance} \n";
        }else{
            echo "Balance Not available";
        }
    }

   protected function addInterest($interest){
        $this->balance += $interest ;
    }

}


class SavingsAccount extends BankAccount{

    private $interestRate ;

    public function __construct($accountNumber , $initialBalance , $ownerNane , $interestRate)
    {
        parent::__construct($accountNumber , $initialBalance , $ownerNane);
        $this->interestRate =  $interestRate ; 
    }

    public function applyInterest(){
       $balance =  $this->getBalanace();
       $interest = $balance * ($this->interestRate / 100) ;       
       $this->addInterest($interest);
       echo "Interest {$interest } taka added | New balance ".$this->getBalanace()."\n"; 

    }

    public function getParentOwnerName(){

        echo "Account Name : {$this->ownerNane} " ;

    }
}

$myAccount = new SavingsAccount("12354698", 50000, "Saiful" , 5);

$myAccount->deposit(2000);
$myAccount->withdraw(1000);
$myAccount->applyInterest();
$myAccount->getParentOwnerName();