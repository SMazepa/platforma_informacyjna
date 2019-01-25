-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Sty 2019, 19:16
-- Wersja serwera: 10.1.34-MariaDB
-- Wersja PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `portal`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `artykul`
--

CREATE TABLE `artykul` (
  `art_id` int(11) NOT NULL,
  `uzy_id` int(11) NOT NULL,
  `art_tytul` varchar(256) NOT NULL,
  `art_tresc` text NOT NULL,
  `art_data` date NOT NULL,
  `art_obraz` text NOT NULL,
  `art_wyswietlenia` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `artykul`
--

INSERT INTO `artykul` (`art_id`, `uzy_id`, `art_tytul`, `art_tresc`, `art_data`, `art_obraz`, `art_wyswietlenia`) VALUES
(11, 4, ' Cztery kobiety otrzymały od skarbu państwa pół miliona złotych odszkodowania. To oszustwo? ', 'Do Sądu Okręgowego w Przemyślu trafił akt oskarżenia przeciwko czterem kobietom w wieku 45, 68, 69 i 72 lat, które wprowadziły w błąd ministra gospodarki. W wyniku oszustwa otrzymały od skarbu państwa ponad 500 tys. zł za rodzinny majątek utracony w wyniku nacjonalizacji. Nie poinformowały, że dwóch spadkobierców z USA otrzymało już zadośćuczynienie. \r\nChodzi o Zakład Ślusarsko-Odlewniczy w Przemyślu, którzy należał do przodków tych kobiet. Przedsiębiorstwo zostało utracone w 1961 roku w wyniku nacjonalizacji. W marcu 1999 r. unieważniono to orzeczenie, co pozwoliło rodzinie ubiegać się o odszkodowanie. W sumie 72-letnia Teresa G., 69-letnia Krystyna R., 68-letnia Maria S. i 45-letnia Agnieszka S. otrzymały od skarbu państwa 558 tys. zł.\r\n\r\n- Oskarżone działając wspólnie i w porozumieniu, w 2000 roku wprowadziły w błąd ministra gospodarki, co do kręgu osób, dziedziczących po ich dziadku i pradziadku, zatajając fakt dziedziczenia dwojga innych spadkobierców. Spadkobiercom tym, mieszkającym w USA, wypłacono już w latach 60 – tych odszkodowania za utracony majątek ich przodka, w ramach Polsko-Amerykańskiego układu indemnizacyjnego przyznając im odszkodowanie w wysokości po 6050 USD wraz z odsetkami – informuje Andrzej Grabowski, rzecznik prasowy Prokuratury Okręgowej w Rzeszowie.\r\n\r\nOkazuje się, że minister działając na podstawie posiadanej dokumentacji, w tym przedstawionej przez oskarżone, nie posiadając wiedzy o pozostałych spadkobiercach wydał decyzję przyznającą odszkodowanie w wysokości łącznej 678 tys. zł., po 169 tys. zł na rzecz każdej z oskarżonych. - Od powyższej decyzji oskarżone odwołały się i na skutek zaskarżenia decyzji, wyrokiem Sądu Okręgowego w Warszawie, z dnia 24 stycznia 2005 roku, sąd zasądził im dalsze odszkodowanie w kwocie po niemal 40 tys. zł – dodaje Grabowski.\r\n\r\nWobec oskarżonych kobiet zastosowano poręczenia majątkowe. Akt oskarżenia trafił do Sądu Okręgowe w Przemyślu. Kobietom grozi kara do 10 lat pozbawienia wolności.', '2019-01-01', 'https://ocdn.eu/pulscms-transforms/1/g7RktkpTURBXy9jOTFiMjAxODNkMDY3MDhiOWM0OWFjOTVmMGZjNjQ3NS5qcGeSlQMAXc0LuM0Gl5MFzQMUzQG8', 0),
(12, 1, 'Podejrzewany o szpiegostwo Piotr D. współpracował z kancelarią Beaty Szydło ', 'Kancelaria szefa rządu potwierdziła, że zatrzymany w zeszłym tygodniu Piotr D., którego służby podejrzewają o szpiegostwo na rzecz Chin, współpracował jako ekspert z kancelarią premier Beaty Szydło - informuje RMF FM. Już kilka dni temu Beata Szydło sama przyznała, że Piotr D. był przedstawicielem UKE w zespole przygotowującym Światowe Dni Młodzieży w Krakowie. \r\n\r\nPiotr D. był członkiem grupy eksperckiej, która pracowała nad wizytą papieża Franciszka w Polsce w 2016 roku. Specjalny zespół miał zagwarantować bezpieczeństwo ojcu świętemu i pielgrzymom przybywającym do Krakowa. Dziennikarz RMF FM Krzysztof Berenda otrzymał oficjalne potwierdzenie kancelarii premiera w tej sprawie. Piotr D. uczestniczył w pracach jako dyrektor Departamentu Kontroli Urzędu Komunikacji Elektronicznej.\r\n\r\nWcześniej Beata Szydło komentowała sprawę na Twitterze. Niedługo po zatrzymaniu Piotra D. w mediach zaczęła krążyć informacja, że pracował on dla Kancelarii Prezesa Rady Ministrów za czasów premier Szydło.\r\n\r\n\"Przecinam medialne sensacje - zatrzymany nie był konsultantem u Szydło! Nie doradzał Szydło i nie pracował dla Szydło. Był natomiast przedstawicielem UKE w zespole przygotowującym wizytę Papieża Franciszka podczas ŚDM. Takie tytuły to manipulacja\" - napisała na Twitterze wicepremier.\r\n\r\nNa początku stycznia sekretarz stanu w Kancelarii Premiera Maciej Wąsik i rzecznik ministra koordynatora służb specjalnych Stanisław Żaryn poinformowali o zatrzymaniu przez ABW pod zarzutem szpiegostwa Weijinga W. - jednego z dyrektorów polskiego oddziału Huawei - i Piotra D. - b. oficera ABW, który - jak podała TVP Info - ostatnio pracował w Orange. Sąd zdecydował o trzymiesięcznym areszcie dla obu podejrzanych. Obaj podejrzewani są o szpiegostwo na szkodę Polski. Grozi im za to kara od roku do 10 lat więzienia.', '2019-01-01', 'https://ocdn.eu/pulscms-transforms/1/wXPktkpTURBXy9iOTVhMDQ0MWE1NDBjMjY0YjMwOGY4Zjk1OWJjZDAyOS5qcGeSlQMAWs0R-s0KHJMFzQMUzQG8', 0),
(13, 1, 'Tajemniczy lodowy dysk na środku rzeki w USA', 'Tajemniczy, ogromny lodowy dysk pojawił się na rzece Presumpscot w stanie Maine (USA). Lodowa kra o nietypowym kształcie miała ponad 90 metrów średnicy i obracała się na środku rzeki. Naukowcy nie mają pewności w jaki sposób powstała tajemnicza kra. Być może za kształt odpowiada panujący na tym odcinku rzeki prąd kolisty.f\r\n\r\nTajemniczy, ogromny lodowy dysk pojawił się na rzece Presumpscot w stanie Maine (USA). Lodowa kra o nietypowym kształcie miała ponad 90 metrów średnicy i obracała się na środku rzeki. Naukowcy nie mają pewności w jaki sposób powstała tajemnicza kra. Być może za kształt odpowiada panujący na tym odcinku rzeki prąd kolisty.\r\n\r\nTajemniczy, ogromny lodowy dysk pojawił się na rzece Presumpscot w stanie Maine (USA). Lodowa kra o nietypowym kształcie miała ponad 90 metrów średnicy i obracała się na środku rzeki. Naukowcy nie mają pewności w jaki sposób powstała tajemnicza kra. Być może za kształt odpowiada panujący na tym odcinku rzeki prąd kolisty.', '2019-01-04', '', 0),
(36, 6, 'Wyzwanie \"10 Year Challenge\" pokazuje, że świat zmienił się na gorsze', 'Od kilku dni w ramach wyzwania \"10 Year Challenge\" wymieniamy się naszymi zabawnymi fotkami sprzed 10 lat. Niektórzy postanowili przy okazji zwrócić uwagę m.in. na zmiany klimatyczne, jakie zaszły w latach 2009-2019.\r\n\r\nPoczątek 2019 roku upływa w sieci pod znakiem wyzwania \"10 Year Challenge\", które polega na publikowaniu swoich zdjęć z 2009 i 2019 roku. Nie wiadomo kto zaczął akcję, ale widocznie trafił w jakiś czuły punkt, bo na samym Instagramie jest już przeszło 3,3 mln zestawień tego typu. Niektórzy sądzą, że za wyzwaniem stoi sam Facebook, który w ten sposób zbiera dane dotyczące tego, jak zmieniliśmy się przez ostatnie 10 lat. Niezależnie od tego jaka jest prawda, \"10 Year Challenge\" dostarczył sporo zabawy fanom nostalgicznych klimatów, wystarczy spojrzeć na odpowiedzi takich gwiazd jak Nicki Minaj, Dua Lipa czy Benedict Cumberbatch.', '2019-01-19', 'https://ocdn.eu/pulscms-transforms/1/1H3k9kpTURBXy9mMjViOTQ1ZjI0YzkxMjU2MzZiYTdmODcyYzUzYzU0Ni5wbmeRkwLNAyYAgaEwAQ', 10),
(37, 2, 'awdw', 'adwdawd', '2019-01-25', '', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `artykul_kategoria`
--

CREATE TABLE `artykul_kategoria` (
  `id` int(11) NOT NULL,
  `kat_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `artykul_kategoria`
--

INSERT INTO `artykul_kategoria` (`id`, `kat_id`, `art_id`) VALUES
(71, 2, 12),
(98, 3, 36),
(99, 4, 36),
(100, 5, 36),
(101, 2, 13),
(102, 5, 13),
(103, 6, 13),
(104, 2, 36),
(105, 3, 36);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `kat_id` int(11) NOT NULL,
  `kat_typ` int(1) NOT NULL,
  `kat_sort` int(11) NOT NULL,
  `kat_nazwa` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`kat_id`, `kat_typ`, `kat_sort`, `kat_nazwa`) VALUES
(1, 0, 1, 'Polska'),
(2, 0, 2, 'Rozrywka'),
(3, 0, 3, 'Świat'),
(4, 0, 5, 'Nauka'),
(5, 0, 6, 'Ciekawostki'),
(6, 0, 7, 'Religia'),
(7, 0, 9, 'Muzyka'),
(10, 0, 66, 'sdfdsfsdfsdf');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarz`
--

CREATE TABLE `komentarz` (
  `kom_id` int(11) NOT NULL,
  `uzy_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL,
  `kom_tresc` text NOT NULL,
  `kom_data` date NOT NULL,
  `pod_komentarz` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `komentarz`
--

INSERT INTO `komentarz` (`kom_id`, `uzy_id`, `art_id`, `kom_tresc`, `kom_data`, `pod_komentarz`) VALUES
(1, 6, 12, 'ciekawy artykuł', '2019-01-19', 2),
(2, 6, 36, 'to straszne, co się dzieje na Ziemi ', '2019-01-19', NULL),
(3, 2, 1, 'test podkom.', '2019-01-02', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarz_pod`
--

CREATE TABLE `komentarz_pod` (
  `kom_pod_id` int(11) NOT NULL,
  `kom_id` int(11) NOT NULL,
  `kom_tresc` text NOT NULL,
  `kom_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `statystyka`
--

CREATE TABLE `statystyka` (
  `stat_id` int(11) NOT NULL,
  `stat_data` date NOT NULL,
  `art_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `statystyka`
--

INSERT INTO `statystyka` (`stat_id`, `stat_data`, `art_id`) VALUES
(1, '2019-01-19', 12),
(2, '2019-01-18', 12),
(3, '2019-01-18', 12),
(4, '2019-01-19', 36),
(5, '2019-01-18', 36),
(6, '2019-01-18', 36),
(7, '2019-01-18', 36),
(8, '2019-01-19', 36),
(9, '2019-01-19', 36),
(10, '2019-01-19', 36),
(11, '2019-01-16', 12),
(12, '2019-01-16', 12),
(13, '2019-01-15', 12),
(14, '2019-01-07', 12),
(15, '2019-01-19', 12),
(16, '2019-01-19', 12),
(17, '2019-01-02', 12),
(18, '2019-01-02', 12),
(19, '2019-01-19', 12),
(20, '2019-01-19', 12),
(21, '2019-01-02', 11),
(22, '2019-01-01', 11),
(23, '2019-01-04', 11),
(24, '2019-01-19', 11),
(25, '2019-01-09', 11),
(26, '2019-01-09', 11),
(27, '2019-01-19', 11),
(28, '2019-01-09', 36),
(29, '2019-01-19', 36),
(30, '2019-01-19', 36),
(31, '2019-01-19', 13),
(32, '2019-01-19', 13),
(33, '2019-01-19', 36),
(34, '2019-01-19', 36),
(35, '2019-01-19', 36),
(36, '2019-01-19', 36),
(37, '2019-01-19', 36),
(38, '2019-01-19', 36),
(39, '2019-01-19', 36),
(40, '2019-01-19', 36),
(41, '2019-01-25', 36);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `uzy_id` int(11) NOT NULL,
  `uzy_rola` int(1) NOT NULL,
  `uzy_imie` varchar(32) NOT NULL,
  `uzy_nazwisko` varchar(32) NOT NULL,
  `uzy_login` varchar(16) NOT NULL,
  `uzy_haslo` varchar(32) NOT NULL,
  `uzy_mail` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`uzy_id`, `uzy_rola`, `uzy_imie`, `uzy_nazwisko`, `uzy_login`, `uzy_haslo`, `uzy_mail`) VALUES
(1, 1, 'Arkadiusz ', 'Zabrzyński', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.pl'),
(6, 1, 'Sylwia ', 'Mazepa', 'sylwia', '0192023a7bbd73250516f069df18b500', 'sylwia.wasiewicz00@gmail.com'),
(7, 2, 'Adam', 'Nowak', 'adam52', '1d7c2923c1684726dc23d2901c4d8157', 'adam@onet.pl');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `artykul`
--
ALTER TABLE `artykul`
  ADD PRIMARY KEY (`art_id`),
  ADD KEY `uzy_id` (`uzy_id`);

--
-- Indeksy dla tabeli `artykul_kategoria`
--
ALTER TABLE `artykul_kategoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kat_id` (`kat_id`),
  ADD KEY `art_id` (`art_id`);

--
-- Indeksy dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`kat_id`);

--
-- Indeksy dla tabeli `komentarz`
--
ALTER TABLE `komentarz`
  ADD PRIMARY KEY (`kom_id`),
  ADD KEY `uzy_id` (`uzy_id`),
  ADD KEY `art_id` (`art_id`),
  ADD KEY `pod_komentarz` (`pod_komentarz`);

--
-- Indeksy dla tabeli `komentarz_pod`
--
ALTER TABLE `komentarz_pod`
  ADD PRIMARY KEY (`kom_pod_id`),
  ADD KEY `kom_id` (`kom_id`);

--
-- Indeksy dla tabeli `statystyka`
--
ALTER TABLE `statystyka`
  ADD PRIMARY KEY (`stat_id`),
  ADD KEY `art_id` (`art_id`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`uzy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `artykul`
--
ALTER TABLE `artykul`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT dla tabeli `artykul_kategoria`
--
ALTER TABLE `artykul_kategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `kat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `komentarz`
--
ALTER TABLE `komentarz`
  MODIFY `kom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `komentarz_pod`
--
ALTER TABLE `komentarz_pod`
  MODIFY `kom_pod_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `statystyka`
--
ALTER TABLE `statystyka`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `uzy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `komentarz`
--
ALTER TABLE `komentarz`
  ADD CONSTRAINT `komentarz_ibfk_1` FOREIGN KEY (`pod_komentarz`) REFERENCES `komentarz` (`kom_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
