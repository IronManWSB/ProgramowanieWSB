-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Cze 2020, 22:16
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bank`
--

DELIMITER $$
--
-- Funkcje
--
CREATE DEFINER=`root`@`localhost` FUNCTION `hello` (`s` CHAR(20)) RETURNS CHAR(50) CHARSET utf8mb4 RETURN CONCAT('Hello, ',s,'!')$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `administratorzy`
--

CREATE TABLE `administratorzy` (
  `IdAdministratora` mediumint(9) NOT NULL,
  `NrKlienta` mediumint(9) NOT NULL,
  `Stanowisko` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adresy`
--

CREATE TABLE `adresy` (
  `NrKlienta` mediumint(9) NOT NULL,
  `Kraj` varchar(45) NOT NULL,
  `Wojewodztwo` varchar(45) NOT NULL,
  `Miasto` varchar(45) NOT NULL,
  `Ulica` varchar(45) NOT NULL,
  `NrUlicy` int(3) NOT NULL,
  `KodPocztowy` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `adresy`
--

INSERT INTO `adresy` (`NrKlienta`, `Kraj`, `Wojewodztwo`, `Miasto`, `Ulica`, `NrUlicy`, `KodPocztowy`) VALUES
(1, 'a', 'a', 'a', 'a', 0, 0),
(2, 'admin', 'admin', 'admin', 'admin', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `alerty`
--

CREATE TABLE `alerty` (
  `IdAlertu` mediumint(9) NOT NULL,
  `NrKlienta` mediumint(9) NOT NULL,
  `NrKonta` varchar(26) NOT NULL,
  `KiedyBalans` decimal(10,2) NOT NULL,
  `BilansKonta` decimal(10,2) NOT NULL,
  `Email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `karty`
--

CREATE TABLE `karty` (
  `IdKarty` mediumint(9) NOT NULL,
  `NrKonta` varchar(26) NOT NULL,
  `SrodkiNaKarcie` decimal(10,2) NOT NULL,
  `DataWaznosciKarty` datetime NOT NULL,
  `RodzajKarty` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `NrKlienta` mediumint(9) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Imie` varchar(50) NOT NULL,
  `Nazwisko` varchar(50) NOT NULL,
  `Pesel` varchar(11) NOT NULL,
  `Telefon` varchar(45) NOT NULL,
  `Login` varchar(45) NOT NULL,
  `Haslo` varchar(45) NOT NULL,
  `TypUzytkownika` smallint(1) DEFAULT NULL,
  `CzyAktywny` smallint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`NrKlienta`, `Email`, `Imie`, `Nazwisko`, `Pesel`, `Telefon`, `Login`, `Haslo`, `TypUzytkownika`, `CzyAktywny`) VALUES
(1, 'a@a', 'a', 'a', '11111111111', 'a', 'a@a', 'a', 0, 0),
(2, 'admin@admin', 'admin', 'admin', '22222222222', 'admin', 'admin@admin', 'admin@admin', 1, 0);

--
-- Wyzwalacze `klienci`
--
DELIMITER $$
CREATE TRIGGER `przed_dodaniem_nrpesel` BEFORE INSERT ON `klienci` FOR EACH ROW BEGIN
        -- condition to check
        IF NEW.pesel < 0 THEN
            -- hack to solve absence of SIGNAL/prepared statements in triggers
            UPDATE `Error: invalid_id_test` SET x=1;
        END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konto`
--

CREATE TABLE `konto` (
  `NrKonta` decimal(26,0) NOT NULL,
  `NrKlienta` mediumint(9) NOT NULL,
  `NrRachunku` mediumint(9) NOT NULL,
  `Depozyt` decimal(10,2) NOT NULL,
  `Wyplata` decimal(10,2) NOT NULL,
  `AktualnyBilans` decimal(10,2) NOT NULL,
  `DostępnyBilans` decimal(10,2) NOT NULL,
  `TypKonta` varchar(45) NOT NULL,
  `NazwaKonta` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `konto`
--

INSERT INTO `konto` (`NrKonta`, `NrKlienta`, `NrRachunku`, `Depozyt`, `Wyplata`, `AktualnyBilans`, `DostępnyBilans`, `TypKonta`, `NazwaKonta`) VALUES
('11223401111111111156780000', 1, 0, '0.00', '0.00', '130.00', '0.00', 'osobiste', 'moje'),
('11223401111111111156781000', 1, 0, '0.00', '0.00', '230.00', '0.00', 'osobiste', 'moje1'),
('11223401111111111156782000', 1, 0, '0.00', '0.00', '130.00', '0.00', 'osobiste', 'moje3'),
('11223401111111111156783000', 1, 0, '0.00', '0.00', '0.00', '0.00', 'osobiste', 'sdsssss'),
('11223401111111111156784000', 1, 0, '0.00', '0.00', '0.00', '0.00', 'osobiste', 's3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konto_osobiste`
--

CREATE TABLE `konto_osobiste` (
  `IdKontaOsobistego` mediumint(9) NOT NULL,
  `NrKonta` varchar(26) NOT NULL,
  `SrodkiNaKoncie` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konto_oszczednosciowe`
--

CREATE TABLE `konto_oszczednosciowe` (
  `IdKontaOszczednosciowego` mediumint(9) NOT NULL,
  `NrKonta` varchar(26) NOT NULL,
  `SrodkiNaKoncie` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontrola`
--

CREATE TABLE `kontrola` (
  `NrKonta` varchar(26) NOT NULL,
  `NrKlienta` mediumint(9) NOT NULL,
  `Depozyt` decimal(10,2) NOT NULL,
  `Wyplata` decimal(10,2) NOT NULL,
  `BilansKonta` decimal(10,2) NOT NULL,
  `DostępnyBilans` decimal(10,2) NOT NULL,
  `LiczbaPrzedmiotow` mediumint(9) NOT NULL,
  `KodKredytu` smallint(6) NOT NULL,
  `LimitKredytu` decimal(10,2) NOT NULL,
  `TypKonta` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `linia_kredytowa`
--

CREATE TABLE `linia_kredytowa` (
  `IdKredytu` mediumint(9) NOT NULL,
  `NrKonta` varchar(26) NOT NULL,
  `OplataZaDebet` decimal(10,2) NOT NULL,
  `WysokoscLiniiKredytu` decimal(10,2) NOT NULL,
  `SumaKredytow` decimal(10,2) NOT NULL,
  `SumaPlatnosci` decimal(10,2) NOT NULL,
  `BilansKonta` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lokaty`
--

CREATE TABLE `lokaty` (
  `IdLokaty` mediumint(9) NOT NULL,
  `NrKonta` varchar(26) NOT NULL,
  `NazwaLokaty` varchar(45) NOT NULL,
  `TypLokaty` varchar(45) NOT NULL,
  `SrodkiNaLokacie` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odbiorcy`
--

CREATE TABLE `odbiorcy` (
  `IdOdbiorcy` mediumint(9) NOT NULL,
  `KontoOdbiorcy` varchar(26) NOT NULL,
  `NazwaSkrocona` varchar(45) NOT NULL,
  `Imie` varchar(45) NOT NULL,
  `Nazwisko` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `odbiorcy`
--

INSERT INTO `odbiorcy` (`IdOdbiorcy`, `KontoOdbiorcy`, `NazwaSkrocona`, `Imie`, `Nazwisko`) VALUES
(0, '11111111111111111111111111', 'a', '1', '1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pelnomocnictwo`
--

CREATE TABLE `pelnomocnictwo` (
  `IdPelnomocnictwa` mediumint(9) NOT NULL,
  `IdSprawy` mediumint(9) NOT NULL,
  `ImiePelnomocnika` varchar(45) NOT NULL,
  `NazwiskoPelnomocnika` varchar(45) NOT NULL,
  `PeselPelnomocnika` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przelewy`
--

CREATE TABLE `przelewy` (
  `IdPrzelewu` mediumint(9) NOT NULL,
  `NazwaOdbiorcy` varchar(45) NOT NULL,
  `TytulPrzelewu` varchar(45) NOT NULL,
  `ZKonta` varchar(26) NOT NULL,
  `ZNrKlienta` mediumint(9) NOT NULL,
  `NaNrKlienta` mediumint(9) NOT NULL,
  `NaKonto` varchar(26) NOT NULL,
  `NrRachunku` mediumint(9) NOT NULL,
  `Kwota` decimal(10,2) NOT NULL,
  `DataPrzelewu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rachunki`
--

CREATE TABLE `rachunki` (
  `NrRachunku` mediumint(9) NOT NULL,
  `NrKonta` varchar(26) NOT NULL,
  `SaldoRachunku` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sprawy`
--

CREATE TABLE `sprawy` (
  `IdSprawy` mediumint(9) NOT NULL,
  `NrKlienta` mediumint(9) NOT NULL,
  `RodzajSprawy` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wspolny_login`
--

CREATE TABLE `wspolny_login` (
  `IdSprawy` mediumint(9) NOT NULL,
  `LoginOsobisty` varchar(45) NOT NULL,
  `LoginFirmowy` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zaswiadczenia`
--

CREATE TABLE `zaswiadczenia` (
  `IdZaswiadczenia` mediumint(9) NOT NULL,
  `IdSprawy` mediumint(9) NOT NULL,
  `RodzajZaswiadczenia` varchar(45) NOT NULL,
  `NazwaZaswiadczenia` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `administratorzy`
--
ALTER TABLE `administratorzy`
  ADD PRIMARY KEY (`IdAdministratora`),
  ADD KEY `NrKlienta` (`NrKlienta`);

--
-- Indeksy dla tabeli `adresy`
--
ALTER TABLE `adresy`
  ADD KEY `NrKlienta` (`NrKlienta`);

--
-- Indeksy dla tabeli `alerty`
--
ALTER TABLE `alerty`
  ADD PRIMARY KEY (`IdAlertu`) KEY_BLOCK_SIZE=9,
  ADD KEY `NrKlienta` (`NrKlienta`),
  ADD KEY `NrKonta` (`NrKonta`);

--
-- Indeksy dla tabeli `karty`
--
ALTER TABLE `karty`
  ADD KEY `NrKonta` (`NrKonta`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`NrKlienta`) KEY_BLOCK_SIZE=9,
  ADD UNIQUE KEY `Pesel` (`Pesel`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Login` (`Login`);

--
-- Indeksy dla tabeli `konto`
--
ALTER TABLE `konto`
  ADD PRIMARY KEY (`NrKonta`) KEY_BLOCK_SIZE=26,
  ADD KEY `NrKlienta` (`NrKlienta`),
  ADD KEY `NrRachunku` (`NrRachunku`);

--
-- Indeksy dla tabeli `konto_osobiste`
--
ALTER TABLE `konto_osobiste`
  ADD PRIMARY KEY (`IdKontaOsobistego`),
  ADD KEY `NrKonta` (`NrKonta`);

--
-- Indeksy dla tabeli `konto_oszczednosciowe`
--
ALTER TABLE `konto_oszczednosciowe`
  ADD PRIMARY KEY (`IdKontaOszczednosciowego`),
  ADD KEY `NrKonta` (`NrKonta`);

--
-- Indeksy dla tabeli `kontrola`
--
ALTER TABLE `kontrola`
  ADD KEY `NrKonta` (`NrKonta`),
  ADD KEY `KodKredytu` (`KodKredytu`),
  ADD KEY `NrKlienta` (`NrKlienta`);

--
-- Indeksy dla tabeli `linia_kredytowa`
--
ALTER TABLE `linia_kredytowa`
  ADD PRIMARY KEY (`IdKredytu`) KEY_BLOCK_SIZE=9,
  ADD KEY `NrKonta` (`NrKonta`);

--
-- Indeksy dla tabeli `lokaty`
--
ALTER TABLE `lokaty`
  ADD PRIMARY KEY (`IdLokaty`),
  ADD KEY `NrKonta` (`NrKonta`);

--
-- Indeksy dla tabeli `sprawy`
--
ALTER TABLE `sprawy`
  ADD PRIMARY KEY (`IdSprawy`),
  ADD KEY `NrKlienta` (`NrKlienta`);

--
-- Indeksy dla tabeli `wspolny_login`
--
ALTER TABLE `wspolny_login`
  ADD KEY `IdSprawy` (`IdSprawy`);

--
-- Indeksy dla tabeli `zaswiadczenia`
--
ALTER TABLE `zaswiadczenia`
  ADD PRIMARY KEY (`IdZaswiadczenia`),
  ADD KEY `IdSprawy` (`IdSprawy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `administratorzy`
--
ALTER TABLE `administratorzy`
  MODIFY `IdAdministratora` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `alerty`
--
ALTER TABLE `alerty`
  MODIFY `IdAlertu` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `NrKlienta` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `konto_osobiste`
--
ALTER TABLE `konto_osobiste`
  MODIFY `IdKontaOsobistego` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `konto_oszczednosciowe`
--
ALTER TABLE `konto_oszczednosciowe`
  MODIFY `IdKontaOszczednosciowego` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `lokaty`
--
ALTER TABLE `lokaty`
  MODIFY `IdLokaty` mediumint(9) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
