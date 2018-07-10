<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Language;

use Delight\PrivacyPolicy\HumanPrivacyPolicy;
use Delight\PrivacyPolicy\Throwable\TranslationNotFoundError;

/** Privacy policy for humans in German */
abstract class GermanPrivacyPolicy extends HumanPrivacyPolicy {

	public function getShortTitle() {
		return 'Datenschutz';
	}

	public function getLongTitle() {
		return 'Datenschutzerklärung';
	}

	protected function translateUnformatted($text) {
		switch ($text) {
			case 'Address':
				return 'Adresse';
			case 'Address of contact':
				return 'Adresse des Kontakts';
			case 'Alias or username':
				return 'Pseudonym oder Benutzername';
			case 'Alias or username of contact':
				return 'Pseudonym oder Benutzername des Kontakts';
			case 'Amount of data transferred for each access':
				return 'Übertragene Datenmenge für jeden Zugriff';
			case 'Android app (available from “Google Play”, a digital distribution platform operated by Google Inc.)':
				return 'Android-App (verfügbar über „Google Play“, eine digitale Vertriebsplattform, betrieben von Google Inc.)';
			case 'As such, cookies and the related technologies are essential for the operation of our services.':
				return 'In diesem Sinne sind Cookies und die ähnlichen Technologien unerlässlich für den Betrieb unserer Dienste.';
			case 'Bank account number':
				return 'Nummer des Bankkontos';
			case 'Bank account number of contact':
				return 'Nummer des Bankkontos des Kontakts';
			case 'Bank identifier':
				return 'Bezeichner der Bank';
			case 'Bank identifier of contact':
				return 'Bezeichner der Bank des Kontakts';
			case 'Bank name':
				return 'Name der Bank';
			case 'Bank name of contact':
				return 'Name der Bank des Kontakts';
			case 'Billing amount of contract':
				return 'Rechnungsbetrag des Vertrages';
			case 'Billing cycle of contract':
				return 'Abrechnungszeitraum des Vertrages';
			case 'Blood group':
				return 'Blutgruppe';
			case 'Body weight':
				return 'Körpergewicht';
			case 'Brand and version of operating system on device':
				return 'Marke und Version des Betriebssystems auf dem Gerät';
			case 'Brand and version of web browser on device':
				return 'Marke und Version des Webbrowsers auf dem Gerät';
			case 'Brand name of credit card':
				return 'Marke der Kreditkarte';
			case 'Brand of operating system on device':
				return 'Marke des Betriebssystems auf dem Gerät';
			case 'Brand of web browser on device':
				return 'Marke des Webbrowsers auf dem Gerät';
			case 'Cancellation period of contract':
				return 'Kündigungsfrist des Vertrages';
			case 'Card number of credit card':
				return 'Kartennummer der Kreditkarte';
			case 'Changes to this privacy policy':
				return 'Änderungen an dieser Datenschutzerklärung';
			case 'Children’s Online Privacy Protection':
				return 'Schutz der Privatsphäre von Kindern';
			case 'City':
				return 'Stadt';
			case 'City of contact':
				return 'Stadt des Kontakts';
			case 'Color of vehicle':
				return 'Farbe des Fahrzeugs';
			case 'Company name':
				return 'Name des Unternehmens';
			case 'Company name of contact':
				return 'Name des Unternehmens des Kontakts';
			case 'Contact information of the controller':
				return 'Kontaktdaten des Verantwortlichen';
			case 'Contract duration after renewal':
				return 'Vertragsdauer nach Verlängerung';
			case 'Contractual partner':
				return 'Vertragspartner';
			case 'Cookies are minimal text files that contain small amounts of data.':
				return 'Cookies sind kleine Textdateien, die geringe Mengen an Daten beinhalten.';
			case 'Cookies':
				return 'Cookies';
			case 'Country':
				return 'Land';
			case 'Country of contact':
				return 'Land des Kontakts';
			case 'Current occupation':
				return 'Aktueller Beruf';
			case 'Custom notes on contract':
				return 'Benutzerdefinierte Notizen zum Vertrag';
			case 'Custom notes on vehicle':
				return 'Benutzerdefinierte Notizen zum Fahrzeug';
			case 'Custom notes':
				return 'Benutzerdefinierte Notizen';
			case 'Date and time for each access':
				return 'Datum und Uhrzeit für jeden Zugriff';
			case 'Date and time of email':
				return 'Datum und Uhrzeit der E-Mail';
			case 'Date and time of letter':
				return 'Datum und Uhrzeit des Briefes';
			case 'Date and time of login':
				return 'Datum und Uhrzeit des Logins';
			case 'Date and time of registration':
				return 'Datum und Uhrzeit der Registrierung';
			case 'Date for each access':
				return 'Datum für jeden Zugriff';
			case 'Date of birth':
				return 'Geburtsdatum';
			case 'Date of birth of contact':
				return 'Geburtsdatum des Kontakts';
			case 'Date of email':
				return 'Datum der E-Mail';
			case 'Date of letter':
				return 'Datum des Briefes';
			case 'Date of login':
				return 'Datum des Logins';
			case 'Date of registration':
				return 'Datum der Registrierung';
			case 'Department of contact within company':
				return 'Abteilung des Kontakts innerhalb des Unternehmens';
			case 'Department within company':
				return 'Abteilung innerhalb des Unternehmens';
			case 'Digitally drawn signature':
				return 'Digital gezeichnete Unterschrift';
			case 'Effective date':
				return 'Datum des Inkrafttretens';
			case 'Email address':
				return 'E-Mail-Adresse';
			case 'Email address of contact':
				return 'E-Mail-Adresse des Kontakts';
			case 'Email address of designated receiver of information on undeliverable email':
				return 'E-Mail-Adresse des vorgesehenen Empfängers von Informationen über unzustellbare E-Mails';
			case 'Email address of designated receiver of replies to email':
				return 'E-Mail-Adresse des vorgesehenen Empfängers von Antworten auf die E-Mail';
			case 'Email address of sender of email':
				return 'E-Mail-Adresse des Absenders der E-Mail';
			case 'Email addresses in BCC line of email':
				return 'E-Mail-Adressen in BCC-Zeile der E-Mail';
			case 'Email addresses in CC line of email':
				return 'E-Mail-Adressen in CC-Zeile der E-Mail';
			case 'Email addresses of recipients of email':
				return 'E-Mail-Adressen der Empfänger der E-Mail';
			case 'Email communication':
				return 'E-Mail-Kommunikation';
			case 'End of contract':
				return 'Vertragsende';
			case 'Expiration date of credit card':
				return 'Ablaufdatum der Kreditkarte';
			case 'Date of expiration':
				return 'Datum des Außerkrafttretens';
			case 'Family name':
				return 'Nachname';
			case 'Family name of contact':
				return 'Nachname des Kontakts';
			case 'Fax number':
				return 'Fax-Nummer';
			case 'Fax number of contact':
				return 'Fax-Nummer des Kontakts';
			case 'Functions performed by them on our behalf may include payment processing, network data transmission, fraud prevention, customer support management and similar services.':
				return 'Funktionen, die diese Parteien für uns und in unserem Auftrag ausführen, können die Zahlungsabwicklung, Datenübertragung im Netzwerk, Betrugsprävention, Verwaltung der Kundenbetreuung und ähnliche Dienstleistungen umfassen.';
			case 'Gender':
				return 'Geschlecht';
			case 'Gender of contact':
				return 'Geschlecht des Kontakts';
			case 'General':
				return 'Allgemein';
			case 'Geographical coordinates':
				return 'Geographische Koordinaten';
			case 'Given name':
				return 'Vorname';
			case 'Given name of contact':
				return 'Vorname des Kontakts';
			case 'Handwritten signature':
				return 'Handschriftliche Unterschrift';
			case 'Hardware or software failure as well as other factors may compromise the security of user information, as is the case with all other providers of digital services.':
				return 'Fehler in Hardware oder Software sowie andere Faktoren können die Sicherheit der Daten von Nutzern beeinträchtigen, so wie es auch bei allen anderen Anbietern von digitalen Dienstleistungen der Fall ist.';
			case 'Headline of letter':
				return 'Überschrift des Briefes';
			case 'Height':
				return 'Körpergröße';
			case 'HTTP request method for each access':
				return 'HTTP-Anfragemethode für jeden Zugriff';
			case 'HTTP status code for each access':
				return 'HTTP-Statuscode für jeden Zugriff';
			case 'In any case, we will provide data only to the extent necessary to satisfy the request, and, whenever possible and legally permitted, we will make a reasonable effort to notify affected users of any such disclosure.':
				return 'In jedem Fall werden wir Daten nur in dem Maße zur Verfügung stellen, das nötig ist, um der Aufforderung zu genügen, und, wann immer es möglich und gesetzlich zulässig ist, werden wir uns in angemessener Weise bemühen, betroffene Nutzer über diese Offenlegung zu benachrichtigen.';
			case 'Information we collect and why we collect it':
				return 'Informationen, die wir erfassen, und warum wir sie erfassen';
			case 'In particular, all connections to and from our services are encrypted using Secure Sockets Layer (SSL) and Transport Layer Security (TLS) technologies.':
				return 'Insbesondere sind alle Verbindungen zu und von unseren Diensten durch die Technologien „Secure Sockets Layer“ (SSL) und „Transport Layer Security“ (TLS) verschlüsselt.';
			case 'Internet Protocol (IP) address':
				return 'Internetprotokoll-Adresse (IP-Adresse)';
			case 'Internet Protocol (IP) address (reduced to 25%% precision)':
				return 'Internetprotokoll-Adresse (IP-Adresse) (reduziert auf 25%% Genauigkeit)';
			case 'Internet Protocol (IP) address (reduced to 50%% precision)':
				return 'Internetprotokoll-Adresse (IP-Adresse) (reduziert auf 50%% Genauigkeit)';
			case 'Internet Protocol (IP) address (reduced to 75%% precision)':
				return 'Internetprotokoll-Adresse (IP-Adresse) (reduziert auf 75%% Genauigkeit)';
			case 'Internet Protocol (IP) address for each access':
				return 'Internetprotokoll-Adresse (IP-Adresse) für jeden Zugriff';
			case 'Internet Protocol (IP) address for each access (reduced to 25%% precision)':
				return 'Internetprotokoll-Adresse (IP-Adresse) für jeden Zugriff (reduziert auf 25%% Genauigkeit)';
			case 'Internet Protocol (IP) address for each access (reduced to 50%% precision)':
				return 'Internetprotokoll-Adresse (IP-Adresse) für jeden Zugriff (reduziert auf 50%% Genauigkeit)';
			case 'Internet Protocol (IP) address for each access (reduced to 75%% precision)':
				return 'Internetprotokoll-Adresse (IP-Adresse) für jeden Zugriff (reduziert auf 75%% Genauigkeit)';
			case 'iOS app (available from the “App Store”, a digital distribution platform operated by Apple Inc.)':
				return 'iOS-App (verfügbar über den „App Store“, eine digitale Vertriebsplattform, betrieben von Apple Inc.)';
			case 'Language of device':
				return 'Sprache des Geräts';
			case 'Date of publication':
				return 'Datum der Veröffentlichung';
			case 'Latest version':
				return 'Aktuellste Version';
			case 'Laws in the jurisdictions that we operate in may obligate us to disclose certain personal information or other information that we collect about our users to local law enforcement authorities.':
				return 'Gesetze in den Rechtssystemen und Zuständigkeitsbereichen, in denen wir unsere Dienste betreiben, können uns dazu verpflichten, bestimmte persönliche Informationen oder andere Informationen, die wir über unsere Nutzer erfassen, gegenüber lokalen Strafverfolgungsbehörden offenzulegen.';
			case 'Links to external websites, applications and products':
				return 'Links zu externen Webseiten, Anwendungen und Produkten';
			case 'List of enclosures to letter':
				return 'Liste der Anlagen zum Brief';
			case 'Logo of company':
				return 'Logo des Unternehmens';
			case 'Make of vehicle':
				return 'Marke des Fahrzeugs';
			case 'Mandatory disclosure':
				return 'Offenlegungspflichten';
			case 'Manufacturer of device':
				return 'Hersteller des Geräts';
			case 'Maximum retention time: %s':
				return 'Maximale Aufbewahrungszeit: %s';
			case 'Mergers and acquisitions':
				return 'Fusionen und Übernahmen';
			case 'Message text of email':
				return 'Nachrichtentext der E-Mail';
			case 'Message text of letter':
				return 'Nachrichtentext des Briefes';
			case 'Mobile phone number':
				return 'Telefonnummer (mobil)';
			case 'Mobile phone number of contact':
				return 'Telefonnummer (mobil) des Kontakts';
			case 'Model name of device':
				return 'Modellbezeichnung des Geräts';
			case 'Model name of vehicle':
				return 'Modellbezeichnung des Fahrzeugs';
			case 'Month and day of birth':
				return 'Monat und Tag der Geburt';
			case 'Month and day of birth of contact':
				return 'Monat und Tag der Geburt des Kontakts';
			case 'Name of contact':
				return 'Name des Kontakts';
			case 'Name':
				return 'Name';
			case 'no':
				return 'nein';
			case 'None of our services are designed for, intended to attract, or directed towards children under the age of %d.':
				return 'Keine unserer Dienste sind für Kinder im Alter unter %d konzipiert, beabsichtigen deren Aufmerksamkeit zu gewinnen oder sind auf sie ausgerichtet.';
			case 'Notes on additional recipients of letter':
				return 'Hinweise auf zusätzliche Empfänger des Briefes';
			case 'Occupation':
				return 'Beruf';
			case 'Our full contact information can be found at:':
				return 'Unsere vollständigen Kontaktdaten sind zu finden unter:';
			case 'Our principles':
				return 'Unsere Prinzipien';
			case 'Password (cleartext)':
				return 'Passwort (Klartext)';
			case 'Password (hash)':
				return 'Passwort (Hash)';
			case 'Password (strong hash)':
				return 'Passwort (starker Hash)';
			case 'Permanent identifier of device':
				return 'Permanente Kennung des Geräts';
			case 'Phone number':
				return 'Telefonnummer';
			case 'Phone number of contact':
				return 'Telefonnummer des Kontakts';
			case 'Picture':
				return 'Bild';
			case 'Place of birth':
				return 'Geburtsort';
			case 'Place of construction of vehicle':
				return 'Herstellungsort des Fahrzeugs';
			case 'Postal code':
				return 'Postleitzahl';
			case 'Postal code of contact':
				return 'Postleitzahl des Kontakts';
			case 'Postscript of letter':
				return 'Postskriptum des Briefes';
			case 'Preferred occupation':
				return 'Bevorzugter Beruf';
			case 'Referring site (URL) for each access':
				return 'Verweisende Webseite (URL) für jeden Zugriff';
			case 'Registration plate number of vehicle':
				return 'Kennzeichen des Fahrzeugs';
			case 'Requested page (URL) for each access':
				return 'Angeforderte Seite (URL) für jeden Zugriff';
			case 'Required:':
				return 'Erforderlich:';
			case 'Resettable identifier of device':
				return 'Zurücksetzbare Kennung des Geräts';
			case 'Residential phone number':
				return 'Telefonnummer (Festnetz)';
			case 'Residential phone number of contact':
				return 'Telefonnummer (Festnetz) des Kontakts';
			case 'Retention and deletion of data':
				return 'Aufbewahrung und Löschung von Daten';
			case 'Service providers, contractors and agents':
				return 'Dienstleister, Auftragnehmer und Vertreter';
			case 'Signature':
				return 'Unterschrift';
			case 'Social Security number (SSN) (United States of America)':
				return 'Sozialversicherungsnummer (SSN) (Vereinigte Staaten von Amerika)';
			case 'Some contents of our services are provided by third parties that are not directly affiliated with us.':
				return 'Manche Inhalte unserer Dienste werden von Drittanbietern bereitgestellt, die nicht direkt mit uns in Verbindung stehen.';
			case 'Some parts and sections of our services may contain external links to websites, applications or products owned by and operated by third parties.':
				return 'Einige Teile und Bereiche unserer Dienste können externe Links zu Webseiten, Anwendungen oder Produkten enthalten, die im Besitz von Dritten sind und von Dritten betrieben werden.';
			case 'Start of contract':
				return 'Vertragsbeginn';
			case 'State':
				return 'Bundesland';
			case 'State of contact':
				return 'Bundesland des Kontakts';
			case 'Steuerliche Identifikationsnummer (Steuer-IdNr.) (Germany)':
				return 'Steuerliche Identifikationsnummer (Steuer-IdNr.) (Deutschland)';
			case 'Steuernummer (St.-Nr) (Germany)':
				return 'Steuernummer (St.-Nr) (Deutschland)';
			case 'Street name and house number':
				return 'Straße und Hausnummer';
			case 'Street name and house number of contact':
				return 'Straße und Hausnummer des Kontakts';
			case 'Subject of email':
				return 'Betreff der E-Mail';
			case 'Subject of letter':
				return 'Betreff des Briefes';
			case 'Such third parties help us provide and improve our services.':
				return 'Solche Drittunternehmen helfen uns, unsere Dienste bereitzustellen und zu verbessern.';
			case 'The policy applies to our websites, mobile apps, software applications, products and services, collectively referred to as “services”.':
				return 'Die Erklärung gilt für unsere Webseiten, mobilen Apps, Software-Anwendungen, Produkte und Dienste, gemeinsam als „Dienste“ bezeichnet.';
			case 'These cookies do not necessarily contain any personal or identifying information.':
				return 'Diese Cookies enthalten nicht zwangsläufig persönliche oder personenbezogene Informationen.';
			case 'These external contents, which are displayed, rendered, played back or otherwise conveyed directly within our services, may include advertising, analytics and components from social media.':
				return 'Diese externen Inhalte, die direkt innerhalb unserer Dienste angezeigt, übertragen, wiedergegeben oder auf andere Weise überbracht werden, können Werbung, Analysedienste und Komponenten von sozialen Medien umfassen.';
			case 'These services include:':
				return 'Diese Dienste umfassen:';
			case 'They may even provide methods to disable the use of such technologies completely.':
				return 'Es können sogar Methoden bereitstehen, um den Gebrauch dieser Technologien vollständig zu deaktivieren.';
			case 'Third-party cookies':
				return 'Cookies von Drittanbietern';
			case 'Time for each access':
				return 'Uhrzeit für jeden Zugriff';
			case 'Time of email':
				return 'Uhrzeit der E-Mail';
			case 'Time of letter':
				return 'Uhrzeit des Briefes';
			case 'Time of login':
				return 'Uhrzeit des Logins';
			case 'Time of registration':
				return 'Uhrzeit der Registrierung';
			case 'Time zone of device':
				return 'Zeitzone des Geräts';
			case 'User-agent string for each access':
				return 'User-Agent-String für jeden Zugriff';
			case 'VAT ID (European Union)':
				return 'USt-IdNr. (Europäische Union)';
			case 'VAT ID (European Union) of contact':
				return 'USt-IdNr. (Europäische Union) des Kontakts';
			case 'Verification code (e.g. CVC, CVV, CSC) of credit card':
				return 'Sicherheitscode (z.B. CVC, CVV, CSC) der Kreditkarte';
			case 'Version of operating system on device':
				return 'Version des Betriebssystems auf dem Gerät';
			case 'Version of web browser on device':
				return 'Version des Webbrowsers auf dem Gerät';
			case 'Version':
				return 'Version';
			case 'Website':
				return 'Webseite';
			case 'Website (URL)':
				return 'Webseite (URL)';
			case 'Website (URL) of contact':
				return 'Webseite (URL) des Kontakts';
			case 'We follow generally accepted industry standards to protect the data submitted to us, both during transmission and after we have received it, and continue to expand our protections as becomes necessary with changing technology.':
				return 'Wir folgen allgemein anerkannten Industriestandards zum Schutz der Daten, die an uns übermittelt werden, sowohl während der Übertragung als auch nach dem Erhalt, und erweitern fortwährend unsere Schutzmaßnahmen, so wie es durch sich ändernde Technologie notwendig wird.';
			case 'We have therefore implemented all measures reasonably necessary to protect the personal information of our users from unauthorized access, modification, deletion, disclosure or other misuse.':
				return 'Wir haben deshalb alle Maßnahmen umgesetzt, die vernünftigerweise notwendig sind, um die persönlichen Informationen unserer Nutzer vor unberechtigtem Zugriff, Veränderung, Löschung, Offenlegung oder sonstigem Missbrauch zu schützen.';
			case 'We may be compelled to such disclosure in response to a court order, a warrant or a similar request by a judicial body or a government agency, or when we believe in good faith that the disclosure is reasonably necessary to protect our rights or property, that of any third party, or the safety of the general public.':
				return 'Wir können zu solch einer Offenlegung durch eine gerichtliche Anordnung, einen Haftbefehl, einen Durchsuchungsbeschluss oder eine ähnliche Aufforderung einer Justizbehörde oder einer Regierungsstelle gezwungen sein, oder wenn wir in gutem Glauben davon ausgehen, dass diese Offenlegung erforderlich ist, um Rechte oder Eigentum von uns oder Dritten oder die Sicherheit der Allgemeinheit zu schützen.';
			case 'We may change this privacy policy from time to time.':
				return 'Gelegentlich können wir diese Datenschutzerklärung anpassen.';
			case 'We may use cookies and similar technologies, such as “Web Storage” (specifically “localStorage”) and “Internal Storage”, to make interactions with our services more convenient, efficient and secure.':
				return 'Wir können Cookies und ähnliche Technologien, wie beispielsweise „Web Storage“ (insbesondere „localStorage“) und „Interner Speicher“, einsetzen, um die Interaktionen mit unseren Diensten bequemer, effizienter und sicherer zu machen.';
			case 'We never knowingly collect any information from children under %d.':
				return 'Niemals erheben wir wissentlich Informationen von Kindern unter %d.';
			case 'We never sell, rent out or trade any of our user’s personal information with third parties for commercial purposes.':
				return 'Niemals verkaufen, verleihen oder handeln wir persönliche Informationen unserer Nutzer mit Dritten für wirtschaftliche Zwecke.';
			case 'We use this information for marketing and promotional purposes.':
				return 'Wir nutzen diese Informationen für Marketing- und Werbezwecke.';
			case 'We use this information for the provision, maintenance and administration of our services and to monitor and protect the security of our services.':
				return 'Wir nutzen diese Informationen für die Bereitstellung, Wartung und Verwaltung unserer Dienste und zum Überwachen und Schützen der Sicherheit unserer Dienste.';
			case 'We use this information to improve our services through research and analysis and to better understand how our services are used.':
				return 'Wir nutzen diese Informationen, um unsere Dienste durch Forschung und Analysen zu verbessern und um besser zu verstehen, wie unsere Dienste genutzt werden.';
			case 'Without these technologies, use of our services would not be reasonably possible.':
				return 'Ohne diese Technologien wäre die Nutzung unserer Dienste nicht in vernünftiger Weise möglich.';
			case 'Year and month of birth':
				return 'Jahr und Monat der Geburt';
			case 'Year and month of birth of contact':
				return 'Jahr und Monat der Geburt des Kontakts';
			case 'Year of birth':
				return 'Geburtsjahr';
			case 'Year of birth of contact':
				return 'Geburtsjahr des Kontakts';
			case 'yes':
				return 'ja';
			case 'Year of construction of vehicle':
				return 'Baujahr des Fahrzeugs';
			case 'Right of access (EU, General Data Protection Regulation (GDPR), Article 15)':
				return 'Auskunftsrecht (EU, Datenschutz-Grundverordnung (DSGVO), Artikel 15)';
			case 'Right to rectification (EU, General Data Protection Regulation (GDPR), Article 16)':
				return 'Recht auf Berichtigung (EU, Datenschutz-Grundverordnung (DSGVO), Artikel 16)';
			case 'Right to erasure (EU, General Data Protection Regulation (GDPR), Article 17)':
				return 'Recht auf Löschung (EU, Datenschutz-Grundverordnung (DSGVO), Artikel 17)';
			case 'Right to restriction of processing (EU, General Data Protection Regulation (GDPR), Article 18)':
				return 'Recht auf Einschränkung der Verarbeitung (EU, Datenschutz-Grundverordnung (DSGVO), Artikel 18)';
			case 'Right to data portability (EU, General Data Protection Regulation (GDPR), Article 20)':
				return 'Recht auf Datenübertragbarkeit (EU, Datenschutz-Grundverordnung (DSGVO), Artikel 20)';
			case 'Right to object (EU, General Data Protection Regulation (GDPR), Article 21)':
				return 'Widerspruchsrecht (EU, Datenschutz-Grundverordnung (DSGVO), Artikel 21)';
			case 'Rights related to automated individual decision-making, including profiling (EU, General Data Protection Regulation (GDPR), Article 22)':
				return 'Rechte bezüglich automatisierter Entscheidungen im Einzelfall, einschließlich Profiling (EU, Datenschutz-Grundverordnung (DSGVO), Artikel 22)';
			case 'We are responsible for the processing of personal data under this policy.':
				return 'Wir sind verantwortlich für die Verarbeitung persönlicher Daten gemäß dieser Erklärung.';
			case 'Lawful basis:':
				return 'Rechtsgrundlage:';
			case 'consent':
				return 'Einwilligung';
			case 'contract':
				return 'Vertrag';
			case 'legal obligation':
				return 'rechtliche Verpflichtung';
			case 'vital interests':
				return 'lebenswichtige Interessen';
			case 'public interest':
				return 'öffentliches Interesse';
			case 'legitimate interests':
				return 'berechtigte Interessen';
			case 'Processing is necessary for compliance with a legal obligation to which we are subject (EU, General Data Protection Regulation (GDPR), Article 6(1)(c)).':
				return 'Die Verarbeitung ist zur Erfüllung einer rechtlichen Verpflichtung erforderlich, der wir unterliegen (EU, Datenschutz-Grundverordnung (DSGVO), Artikel 6(1)(c)).';
			case 'Processing is necessary for the performance of a task carried out in the public interest or in the exercise of official authority vested in us (EU, General Data Protection Regulation (GDPR), Article 6(1)(e)).':
				return 'Die Verarbeitung ist für die Wahrnehmung einer Aufgabe erforderlich, die im öffentlichen Interesse liegt oder in Ausübung öffentlicher Gewalt erfolgt, die uns übertragen wurde (EU, Datenschutz-Grundverordnung (DSGVO), Artikel 6(1)(e)).';
			case 'Processing is necessary for the purposes of legitimate interests pursued by us or by a third party (EU, General Data Protection Regulation (GDPR), Article 6(1)(f)).':
				return 'Die Verarbeitung ist zur Wahrung unserer berechtigten Interessen oder derer eines Dritten erforderlich (EU, Datenschutz-Grundverordnung (DSGVO), Artikel 6(1)(f)).';
			case 'Condition for the processing of special categories of personal data:':
				return 'Bedingung zur Verarbeitung besonderer Kategorien persönlicher Daten:';
			case 'explicit consent':
				return 'ausdrückliche Einwilligung';
			case 'employment and social security':
				return 'Arbeit und soziale Sicherheit';
			case 'foundation, association or non-profit':
				return 'Stiftung, Vereinigung oder Organisation ohne Gewinnerzielungsabsicht';
			case 'public data':
				return 'öffentliche Daten';
			case 'legal claims or judicial capacity':
				return 'Rechtsansprüche oder justizielle Tätigkeit';
			case 'substantial public interest':
				return 'erhebliches öffentliches Interesse';
			case 'health and social care':
				return 'Gesundheit und Soziales';
			case 'public health':
				return 'öffentliche Gesundheit';
			case 'archiving or research':
				return 'Archivierung oder Forschung';
			case 'Processing is necessary for the purposes of carrying out obligations and exercising specific rights in the field of employment and social security and social protection law (EU, General Data Protection Regulation (GDPR), Article 9(2)(b)).':
				return 'Die Verarbeitung ist erforderlich, damit aus dem Arbeitsrecht und dem Recht der sozialen Sicherheit und des Sozialschutzes erwachsende Rechte ausgeübt und diesbezüglichen Pflichten nachgekommen werden kann (EU, Datenschutz-Grundverordnung (DSGVO), Artikel 9(2)(b)).';
			case 'Processing is carried out by a foundation, association or any other not-for-profit body with a political, philosophical, religious or trade union aim and on condition that the processing relates solely to the members or to former members of the body or to persons who have regular contact with it (EU, General Data Protection Regulation (GDPR), Article 9(2)(d)).':
				return 'Die Verarbeitung erfolgt durch eine politisch, weltanschaulich, religiös oder gewerkschaftlich ausgerichtete Stiftung, Vereinigung oder sonstige Organisation ohne Gewinnerzielungsabsicht und unter der Voraussetzung, dass sich die Verarbeitung ausschließlich auf die Mitglieder oder ehemalige Mitglieder der Organisation oder auf Personen, die regelmäßige Kontakte mit ihr unterhalten, bezieht (EU, Datenschutz-Grundverordnung (DSGVO), Artikel 9(2)(d)).';
			case 'Processing is necessary for the establishment, exercise or defence of legal claims or for a court acting in its judicial capacity (EU, General Data Protection Regulation (GDPR), Article 9(2)(f)).':
				return 'Die Verarbeitung ist zur Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen oder bei Handlungen der Gerichte im Rahmen ihrer justiziellen Tätigkeit erforderlich (EU, Datenschutz-Grundverordnung (DSGVO), Artikel 9(2)(f)).';
			case 'Processing is necessary for reasons of substantial public interest (EU, General Data Protection Regulation (GDPR), Article 9(2)(g)).':
				return 'Die Verarbeitung ist aus Gründen eines erheblichen öffentlichen Interesses erforderlich (EU, Datenschutz-Grundverordnung (DSGVO), Artikel 9(2)(g)).';
			case 'Processing is necessary for the purposes of preventive or occupational medicine, for the assessment of the working capacity of the employee, medical diagnosis, the provision of health or social care or treatment or the management of health or social care systems and services (EU, General Data Protection Regulation (GDPR), Article 9(2)(h)).':
				return 'Die Verarbeitung ist für Zwecke der Gesundheitsvorsorge oder der Arbeitsmedizin, für die Beurteilung der Arbeitsfähigkeit des Beschäftigten, für die medizinische Diagnostik, die Versorgung oder Behandlung im Gesundheits- oder Sozialbereich oder für die Verwaltung von Systemen und Diensten im Gesundheits- oder Sozialbereich erforderlich (EU, Datenschutz-Grundverordnung (DSGVO), Artikel 9(2)(h)).';
			case 'Processing is necessary for reasons of public interest in the area of public health, such as protecting against serious cross-border threats to health or ensuring high standards of quality and safety of health care and of medicinal products or medical devices (EU, General Data Protection Regulation (GDPR), Article 9(2)(i)).':
				return 'Die Verarbeitung ist aus Gründen des öffentlichen Interesses im Bereich der öffentlichen Gesundheit, wie dem Schutz vor schwerwiegenden grenzüberschreitenden Gesundheitsgefahren oder zur Gewährleistung hoher Qualitäts- und Sicherheitsstandards bei der Gesundheitsversorgung und bei Arzneimitteln und Medizinprodukten erforderlich (EU, Datenschutz-Grundverordnung (DSGVO), Artikel 9(2)(i)).';
			case 'Processing is necessary for archiving purposes in the public interest, scientific or historical research purposes or statistical purposes (EU, General Data Protection Regulation (GDPR), Article 9(2)(j)).':
				return 'Die Verarbeitung ist für im öffentlichen Interesse liegende Archivzwecke, für wissenschaftliche oder historische Forschungszwecke oder für statistische Zwecke erforderlich (EU, Datenschutz-Grundverordnung (DSGVO), Artikel 9(2)(j)).';
			default:
				throw new TranslationNotFoundError();
		}
	}

	protected function formatDate($unixTimestamp) {
		return \IntlDateFormatter::create('de_DE', \IntlDateFormatter::LONG, \IntlDateFormatter::NONE)->format($unixTimestamp);
	}

	protected function formatHours($n) {
		return \sprintf(($n === 1 ? '%d Stunde' : '%d Stunden'), $n);
	}

	protected function formatDays($n) {
		return \sprintf(($n === 1 ? '%d Tag' : '%d Tage'), $n);
	}

	protected function formatWeeks($n) {
		return \sprintf(($n === 1 ? '%d Woche' : '%d Wochen'), $n);
	}

	protected function formatMonths($n) {
		return \sprintf(($n === 1 ? '%d Monat' : '%d Monate'), $n);
	}

}
