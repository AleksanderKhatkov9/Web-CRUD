
/** @author Hatkov Sasha <sashaaa@ad.atlant.by>
 * скрипт SQL для создания новой таблице nomenclature
 */

USE glossary;
create database glossary;
drop table nomenclature;
-- --------------------------------------------------------
-- Table structure for table `nomenclature`
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS nomenclature (
  id int(11) NOT NULL AUTO_INCREMENT COMMENT 'id термина',
  str_doc varchar(255) NOT NULL COMMENT 'вид и название документов по стандарту',
  nomencl_doc text NOT NULL COMMENT 'вид и название документов по номенклатуре дел',
  storages varchar(255) NOT NULL  COMMENT 'место хранения',
  shelf_life varchar(255) NOT NULL  COMMENT 'срок хранения',
  notes_item_number varchar(45) NOT NULL COMMENT 'номер пункта по перечню',
  notes varchar(255) NOT NULL COMMENT 'примечание',
  st_type varchar(255) NOT NULL COMMENT 'вид стандарта',
  st_be varchar(255) NOT NULL,
  st_ce varchar(255) NOT NULL,
  st_num varchar(16) NOT NULL,
  st_year int(4) NOT NULL,
  doc_carrier text COMMENT 'носитель документа',
  PRIMARY KEY (id),
  KEY id (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


INSERT INTO nomenclature (str_doc, nomencl_doc, storages, shelf_life, notes_item_number, notes, st_type, st_be, st_ce, st_num, st_year, doc_carrier) VALUES
('Журнал регистрации распечатанных документов', '-', 'Структурные подразделения по принадлежности', '3 года', '91*', '-','СТО АТЛАНТ','01','21','151',2021,'Бумажный'),
('Журнал регистрации ТД и изменений к ней (ИИ), предъявляемых на нормоконтроль в УСМиДО', '-', 'УСМиДО БС', '3 года', '91*', '-','СТО','01','21','023',2021,'Бумажный'),
('Журнал проведения нормоконтроля ТД и изменений к ней (ИИ)', '-', 'УСМиДО БС', '3 года', '91*', '-','СТО','01','21','023',2021,'Бумажный'),
('Перечень замечаний', '-', 'СЭД «ДЕЛО» (Р16970)', '5 лет ЭПК', '32*', '-','СТО','01','21','023',2021,'Бумажный'),
('Реестры рисков (приложение к Целям в области качества)', '-', 'УСМиДО БМПП', 'Постоянно', '127.1*', '-','СТО','01','21','258',2021,'Бумажный'),
('Реестр возможностей (приложение к Целям в области качества)', '-', 'УСМиДО БМПП', 'Постоянно', '127.1*', '-','СТО','01','21','258',2021,'Бумажный'),
('План мероприятий по достижению Целей в области качества (приложение к Целям в области качества)', '-', 'УСМиДО БМПП', 'Постоянно', '127.1*', '-','СТО','01','21','258',2021,'Бумажный'),
('Протокол изменений подетальных норм расхода материалов', '-', 'УИТ БД (Р21070)', '3 года', '1058*', '-','СТО','01','56','039',2020,'Электронный+бумажный'),
('Протокол подетальных норм расхода основных материалов на изделия по цехам', '-', 'УИТ БД (21070)', '3 года', '1058*', '-','СТО','01','56','039',2020,'Электронный+бумажный'),
('Протокол изменений пооперационных норм расхода материалов', '-', 'УИТ БД (Р21080)', '3 года', '1058*', '-','СТО','01','56','039',2020,'Электронный+бумажный'),
('Сводные нормы расхода материалов на изделия', '-', 'Технический архив ОТР БТ', '10 лет', '1055.1*', '-','СТО','01','56','039',2020,'Бумажный'),
('Протокол изменения норм расхода материалов на изделия', '-', 'УИТ БД(Р21070)', '3 года', '1058*', '-','СТО','01','56','039',2020,'Электронный+бумажный'),
('Протокол изменения норм расхода (потребности) в ТМЦ', '-', 'УИТ БД (21280)', '3 года', '1058*', '-','СТО','01','56','039',2020,'Электронный+бумажный'),
('Нормативы технологически неизбежных потерь на наладку) и испытания особо сложного, требующего частой переналадки, подналадки технологического оборудования, и оснастки', '-', 'Технический архив ОТР БТ', '10 лет', '105.1*', '-','СТО','01','56','039',2020,'Бумажный'),
('Акты об отклонении фактического расхода ТМЦ от норма-тивного за месяц (год)', '-', 'Структурное подразделение, ЦБ', '3 года', '1057*', '-','СТО','01','56','039',2020,'Бумажный'),
('Планы бюджетов. Планы поступлений, финансирования, кредитования и документы к ним. Документы по уточнению бюджетов', '-', 'ФБУ', 'Постоянно', '265*, 266*, 276*', '-','СТО','01','20','284',2021,'Бумажный'),
('Документы о составлении и исполнении бюджетов', '-', 'ФБУ', '5 лет ЭПК', '273*', '-','СТО','01','20','284',2021,'Бумажный'),
('Годовой отчет по исполнению бюджетов, планов финансирования и кредитования', '-', 'ФБУ', 'Постоянно', '278.1*', '-','СТО','01','20','284',2021,'Бумажный'),
('Квартальный отчет по исполнению бюджетов, планов финансирования и кредитования', '-', 'ФБУ', '3 года (при отсутствии годового отчета - постоянно)', '278.2*', '-','СТО','01','20','284',2021,'Бумажный'),
('Месячный  отчет по исполнению бюджетов, планов финансирования и кредитования', '-', 'ФБУ', '1 год (при отсутствии годовых и квартальных отчетов - постоянно)', '278.1*', '-','СТО','01','20','284',2021,'Бумажный'),
('Договоры банковского вклада (депозита) и текущего (расчетного) банковского счета и документы к ним', '-', 'ФБУ', 'Постоянно', '285*, 286*', '-','СТО','01','20','284',2021,'Бумажный'),
('Договоры на закупку банковских услуг, кредитные договоры и договоры обеспечения к ним', '-', 'ФБУ', '5 лет ЭПК', '304*', '-','СТО','01','20','284',2021,'Бумажный'),
('Журнал регистрации распечатанных документов', '-', 'Структурное подразделение по принадлежности', '3 года', '91*', '-','СТО АТЛАНТ','01','21','151',2021,'Бумажный'),
('Перечень замечаний', '-', 'УСМиДО БС', '5 лет ЭПК', '-', '-','СТО','01','21','024',2021,'Бумажный'),
('Журнал регистрации КД', '-', 'УСМиДО БС', '10 лет', '785*', '-','СТО','01','21','024',2021,'Бумажный'),
('Журнал сдачи КД в УСМиДО БТД', '-', 'УСМиДО БС', '10 лет', '785*', '-','СТО','01','21','024',2021,'Бумажный'),
('Реестры рисков (приложение к Целям в области качества)', '-', 'УСМиДО', 'Постоянно', '128*, 129*', '-','СТО','01','21','258',2021,'Бумажный'),
('Реестр возможностей (приложение к Целям в области качества', '-', 'УСМиДО', 'Постоянно', '128*, 129*', '-','СТО','01','21','258',2021,'Бумажный'),
('План мероприятий по достижению Целей в области качества (приложение к Целям в области качества)', '-', 'УСМиДО', 'Постоянно', '128*, 129*', '-','СТО','01','21','258',2021,'Бумажный'),
('Маршрутная карта технологического процесса', '-', 'ИО. Дополнительно: в папке «Archiv IO» на сер-вере NW5, file-server1, Р22150  ', 'До минования надобности', '870*', '-','СТО','01','35','166',2021,'Электронный+бумажный'),
('Ведомость деталей с отверстиями под транспортные элементы', '-', 'ИО Дополнительно: в папке «Archiv IO» на сер-вере NW5, file-server1, Р22150 ', 'До минования надобности', '870*', '-','СТО','01','35','166',2021,'Электронный+бумажный'),
('Подетальная ведомость изготовления изделия', '-', 'ИО Дополнительно: в папке «Archiv IO» на сер-вере NW5, file-server1, Р22150 ', 'До минования надобности', '870*', '-','СТО','01','35','166',2021,'Электронный+бумажный'),
('Ведомость заявок на числовое программное управление', '-', 'ИО Дополнительно: в папке «Archiv IO» на сер-вере NW5, file-server1, Р22150 ', 'До минования надобности', '870*', '-','СТО','01','35','166',2021,'Электронный+бумажный'),
('Технологический процесс на изготовление специального инструмента 2-го порядка', '-', 'ИО Дополнительно: в папке «Archiv IO» на сер-вере NW5, file-server1, Р22150', 'До минования надобности', '870*', '-','СТО','01','35','166',2021,'Электронный+бумажный'),
('Сводная ведомость заготовок для изготовления специального инструмента', '-', 'ИО Дополнительно: в папке «Archiv IO» на сер-вере NW5, file-server1, Р22150', 'До минования надобности', '870*', '-','СТО','01','35','166',2021,'Электронный+бумажный'),
('Журнал регистрации документов о патентных исследованиях', '-', 'Постоянно ЭПК', 'УСМиДО', '-', '-','СТО','01','21','010',2021,'Бумажный'),
('Задание на проведение патентных исследований', '-', 'УСМиДО', 'Постоянно', '743*', '-','СТО','01','21','010',2021,'Бумажный'),
('Пояснительная записка к заданию на проведение патентных исследований', '-', 'УСМиДО', 'Постоянно', '743', '-','СТО','01','21','010',2021,'Бумажный'),
('Регламент поиска', '-', 'УСМиДО', 'Постоянно', '743*', '-','СТО','01','21','010',2021,'Бумажный'),
('Отчет о поиске', '-', 'УСМиДО', 'Постоянно', '743*', '-','СТО','01','21','010',2021,'Бумажный'),
('Отчет о патентных исследованиях', '-', 'УСМиДО', 'Постоянно', '743*', '-','СТО','01','21','010',2021,'Бумажный'),
('Патентный формуляр', '-', 'УСМиДО', 'Постоянно', '743*', '-','СТО','01','21','010',2021,'Бумажный'),
('Реестр объектов интеллектуальной собственности ЗАО «АТЛАНТ»', '-', 'УСМиДО', 'Постоянно', '701*', '-','СТО АТЛАНТ','01','21','172',2021,'Бумажный'),
('Отчет об анализе эффективности управления интеллектуальной собственностью ЗАО «АТЛАНТ»', '-', 'УСМиДО', 'Постоянно', '710*', '-','СТО АТЛАНТ','01','21','172',2021,'Бумажный'),
('Патент Республики Беларусь на изобретение', '-', 'УСМиДО, ОТР МП БСЗ', 'Постоянно', '681*', '-','СТО АТЛАНТ','01','21','172',2021,'Бумажный'),
('Патент Республики Беларусь на полезную модель', '-', 'УСМиДО, ОТР МП БСЗ', 'Постоянно', '682*', '-','СТО АТЛАНТ','01','21','172',2021,'Бумажный'),
('Патент Республики Беларусь на промышленный образец', '-', 'УСМиДО, ОТР МП БСЗ', 'Постоянно', '683*', '-','СТО АТЛАНТ','01','21','172',2021,'Бумажный'),
('Патент  на  ОПС международных организаций и иностранных государств', '-', 'УСМиДО, ОТР МП БСЗ', 'Постоянно', '687*', '-','СТО АТЛАНТ','01','21','172',2021,'Бумажный'),
('Свидетельство Республики Беларусь на товарные знаки', '-', 'УСМиДО', 'Постоянно', '685*', '-','СТО АТЛАНТ','01','21','172',2021,'Бумажный'),
('Лицензионный договор о передаче права на использование ОПС', '-', 'УСМиДО', '10 лет ЭПК', '715*, 66**', '-','СТО АТЛАНТ','01','21','172',2021,'Бумажный'),
('Книги замечаний и предложений', '-', 'УСМиДО, ОСиД БСЗ, ГОД ЗБТ, структурные подразделения в которых ведется книга', '5 лет', '68*, 80**', '-','П АТЛАНТ','01','21','041',2021,'Бумажный'),
('Документы о результатах рассмотрения замечаний и (или) предложений, внесенных в книгу замечаний и предложений (копии ответов, справки, информации, переписка и др.)', '-', 'УСМиДО, ОСиД БСЗ, ГОД ЗБТ, структурные подразделения в которых ведется книга', '5 лет', '69*, 81**', '-','П АТЛАНТ','01','21','041',2021,'Бумажный'),
('Документы о результатах проведения проверок соблюдения порядка ведения и хранения книги замечаний и предложений (акты (справки), предписания, сведения, объяснительные записки, переписка и др.)', '-', 'КРО', '5 лет ЭПК', '79*, 91**', '-','П АТЛАНТ','01','21','041',2021,'Бумажный'),
('Докладная записка (в БСЗ – служебная записка)', '-', '5 лет ЭПК УСМиДО, ОСиД БСЗ, ГОД ЗБТ, структурные подразделения в которых ведется книга', '5 лет ЭПК', '32*', '-','П АТЛАНТ','01','21','041',2021,'Бумажный'),
('Договор на приобретение книги', '-', 'УСМиДО, ОСиД БСЗ', '3 года', '54*, 66**', '-','П АТЛАНТ','01','21','041',2021,'Бумажный');