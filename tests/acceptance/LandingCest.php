<?php


class LandingCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
     $I->amOnPage('/');
    $I->see('ilegal');   
    }


    public function garantindoBotaoUnicoTest(AcceptanceTester $I)
    {
     $I->amOnPage('/');
    $I->see('Realize a sua denuncia!!');   
    } 

    public function deveTerBotaoEnviarDenunciaTest(AcceptanceTester $I)
    {
     $I->amOnPage('/');
    $I->see('Enviar denuncia!!');   
    } 
}
