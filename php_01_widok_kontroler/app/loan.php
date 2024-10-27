<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$amount = $_REQUEST ['amount'];
$numberOfYears = $_REQUEST ['numberOfYears'];
$interest = $_REQUEST ['interest'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($amount) && isset($numberOfYears) && isset($interest))) {
    //sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
    $messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ($amount == "") {
    $messages [] = 'Nie podano kwoty';
}
if ($numberOfYears == "") {
    $messages [] = 'Nie podano liczby lat';
}
if ($interest == "") {
    $messages [] = 'Nie podano raty';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {

    // sprawdzenie, czy $x i $y są liczbami całkowitymi
    if (! is_numeric( $amount )) {
        $messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
    }
    if (! is_numeric( $numberOfYears )) {
        $messages [] = 'Druga wartość nie jest liczbą całkowitą';
    }
    if (! is_numeric( $interest )) {
        $messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
    }

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów

    //konwersja parametrów na int
    $amount = intval($amount);
    $numberOfYears = intval($numberOfYears);
    $interest = intval($interest);

    $loanResult = ($amount + $amount * ($interest / 100)) / ($numberOfYears * 12);
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';