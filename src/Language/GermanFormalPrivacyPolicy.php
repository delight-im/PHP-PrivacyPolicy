<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Language;

/** Privacy policy for humans in formal German ("Sie") */
class GermanFormalPrivacyPolicy extends GermanPrivacyPolicy {

	protected function translateUnformatted($text) {
		switch ($text) {
			case 'Apart from that, please recognize that protecting your personal information is, in other parts, also your own responsibility.':
				return 'Bitte denken Sie im Übrigen daran, dass der Schutz Ihrer persönlichen Informationen in anderen Teilen ebenso Ihrer eigenen Verantwortung unterliegt.';
			case 'As a condition for your use of our services as a customer, user or visitor (collectively referred to as a “user” or as your “use”), you consent to the terms of this policy and you agree that your personal information will be handled as outlined below.':
				return 'Als Bedingung für Ihre Nutzung unserer Dienste als Kunde, Nutzer oder Besucher (zusammen als „Nutzer“ oder als Ihre „Nutzung“ bezeichnet) stimmen Sie den Bedingungen dieser Erklärung zu und Sie erklären sich damit einverstanden, dass Ihre persönlichen Informationen wie im Folgenden beschrieben verarbeitet werden.';
			case 'Especially, you are responsible for safeguarding any passwords and other authentication information that you use to access our services, as well as limiting physical access to the devices used.':
				return 'Insbesondere sind Sie dafür verantwortlich, jegliche Passwörter und andere Informationen zur Authentifizierung zu schützen, die Sie nutzen, um auf unsere Dienste zuzugreifen, sowie dafür, den Zugang zu den genutzten Geräten einzuschränken.';
			case 'For any less significant changes to this privacy policy that do not affect your rights or choices in a material way, we encourage all users to check this policy for updated versions periodically.':
				return 'Für jegliche Änderungen an dieser Datenschutzerklärung, die von geringerer Bedeutung sind und Ihre Rechte oder Wahlmöglichkeiten nicht in wichtiger Weise betreffen, empfehlen wir allen Nutzern, diese Erklärung regelmäßig hinsichtlich aktualisierter Versionen zu überprüfen.';
			case 'For example, we may use these technologies to keep you signed in and to remember your preferences with regard to our services.':
				return 'Wir können diese Technologien zum Beispiel verwenden, um Sie eingeloggt bleiben zu lassen und um Ihre Einstellungen im Hinblick auf unsere Dienste beizubehalten.';
			case 'For more information on how to delete such data currently stored on your device, please refer to the manual or help section of your web browser or operating system.':
				return 'Weitere Informationen darüber, wie Sie solche Daten, die zurzeit auf Ihrem Gerät gespeichert sind, löschen können, finden Sie im Handbuch oder Hilfebereich Ihres Webbrowsers oder Betriebssystems.';
			case 'For our contact information, please see further below.':
				return 'Unsere Kontaktdaten finden Sie weiter unten.';
			case 'From time to time, we may share some information we have collected from you, including personal information, with a limited number of third-party vendors, service providers, contractors, resellers, agents or business partners, solely for the purpose of performing certain functions on our behalf.':
				return 'Gelegentlich geben wir möglicherweise einen Teil der Informationen, die wir über Sie erfasst haben, einschließlich persönlicher Informationen, an eine begrenzte Zahl von Drittunternehmen weiter, darunter Lieferanten, Dienstleister, Auftragnehmer, Vertriebspartner und Vertreter. Dies geschieht ausschließlich zur Ausführung bestimmter Funktionen für uns und in unserem Auftrag.';
			case 'However, please be aware that, despite our best efforts, no method of electronic transmission or storage is perfectly secure and no measures can guarantee absolute security.':
				return 'Beachten Sie jedoch bitte, dass trotz unserer größten Bemühungen keine Methode der elektronischen Datenübertragung oder Datenspeicherung vollkommen sicher ist und keine Maßnahmen eine absolute Sicherheit garantieren können.';
			case 'How we secure your information':
				return 'Wie wir Ihre Informationen sichern';
			case 'If any such change of ownership happens, the organization receiving your personal information will have to respect the promises that we have made in any pre-existing privacy policy such as this one.':
				return 'Falls ein solcher Wechsel des Eigentümers stattfinden sollte, wird die Gesellschaft, die Ihre persönlichen Informationen erhält, die Zusagen, die wir in einer zuvor existierenden Datenschutzerklärung wie dieser gemacht haben, anerkennen und achten müssen.';
			case 'If in doubt, rather do not share sensitive information.':
				return 'Geben Sie sensible Informationen im Zweifelsfall eher nicht preis.';
			case 'If we are involved in a merger, an acquisition by another company, or a sale of all or a portion of our business or assets, your information will likely be among the assets transferred.':
				return 'Wenn wir in eine Fusion, eine Übernahme durch ein anderes Unternehmen oder einen Verkauf unseres gesamten Unternehmens, unserer gesamten Vermögenswerte oder Teilen davon involviert sind, werden Ihre Informationen wahrscheinlich Bestandteil der zu übertragenden Vermögensgüter sein.';
			case 'If we have any plausible reason to believe that you are a user who is under the age of %d, we will have to prohibit you from continuing your use of our services.':
				return 'Wenn wir einen glaubwürdigen Grund haben, anzunehmen, dass Sie ein Nutzer im Alter unter %d sind, müssen wir Ihnen die weitere Nutzung unserer Dienste untersagen.';
			case 'If you are a child below that age, you may not use any of our services.':
				return 'Wenn Sie ein Kind unterhalb dieses Alters sind, dürfen Sie keinen unserer Dienste nutzen.';
			case 'If you have any questions or concerns regarding this policy, our privacy practices or certain aspects of our services, please contact us at any time.':
				return 'Sollten Sie irgendwelche Fragen oder Bedenken bezüglich dieser Erklärung, unserer Datenschutzpraktiken oder bestimmter Aspekte unserer Dienste haben, nehmen Sie bitte jederzeit Kontakt mit uns auf.';
			case 'If you need help, please contact us.':
				return 'Wenn Sie Hilfe benötigen, kontaktieren Sie uns bitte.';
			case 'If you would like to cancel your use of our services, delete your account, or delete your personal information, you may do so in the respective sections of our services.':
				return 'Wenn Sie Ihre Nutzung unserer Dienste beenden möchten, Ihr Benutzerkonto löschen möchten oder Ihre persönlichen Informationen entfernen möchten, können Sie dies in den jeweiligen Bereichen unserer Dienste tun.';
			case 'In general, the applicable version of this policy is the one that is current at the time of your access of our services.':
				return 'Im Allgemeinen ist die gültige Version dieser Erklärung diejenige, die zum Zeitpunkt Ihres Zugriffs auf unsere Dienste aktuell ist.';
			case 'In order to prevent loss of data due to human errors or system failures, we keep additional backup copies of data, as most companies and service providers do, which may include some of your personal information.':
				return 'Um Datenverlust durch menschliche Fehler oder durch Systemfehler zu verhindern, bewahren wir, wie es die meisten Unternehmen und Dienstleister tun, zusätzliche Sicherheitskopien auf, die Teile Ihrer persönlichen Informationen enthalten können.';
			case 'Most changes will presumably be minor only and will therefore not affect your rights.':
				return 'Die meisten Änderungen werden in Umfang und Bedeutung wahrscheinlich nur gering sein und deshalb Ihre Rechte nicht betreffen.';
			case 'Protecting your privacy and keeping your personal information safe is our highest priority.':
				return 'Die Sicherung Ihrer Privatsphäre und der Schutz Ihrer persönlichen Informationen haben für uns höchste Priorität.';
			case 'See further below for our contact information.':
				return 'Unsere Kontaktdaten finden Sie weiter unten.';
			case 'Should there be any substantial changes to this policy with material effects on any of your rights or choices, you will be notified via a prominent notice within our services or by email to the primary email address specified in your account at least %d days prior to such changes taking effect.':
				return 'Sollte es wesentliche Änderungen an dieser Erklärung mit wichtigen Auswirkungen auf Ihre Rechte oder Wahlmöglichkeiten geben, werden Sie durch eine auffällige Ankündigung innerhalb unserer Dienste oder per E-Mail an die primäre E-Mail-Adresse, die in Ihrem Benutzerkonto hinterlegt ist, mindestens %d Tage vor dem Inkrafttreten solcher Änderungen benachrichtigt.';
			case 'Should you believe that we might have any personal information of a child under the age of %d, in particular a child of your own, please contact us so that the data in question can be deleted, if appropriate.':
				return 'Sollten Sie glauben, dass wir persönliche Informationen von einem Kind unter %d gespeichert haben könnten, insbesondere von einem Ihrer Kinder, kontaktieren Sie uns bitte umgehend, sodass die betroffenen Daten, falls zutreffend, gelöscht werden können.';
			case 'These third parties do not have any right to use the information that we share about you beyond what is necessary to assist us with the specific task at hand.':
				return 'Diese Drittunternehmen sind nicht berechtigt, die Informationen, die wir über Sie weitergeben, über das Maß hinaus zu nutzen, das notwendig ist, um uns bei der konkreten Aufgabenstellung zu unterstützen.';
			case 'The settings and features of your web browser or operating system may allow you to control how third parties can store cookies on your device.':
				return 'Die Einstellungen und Funktionen Ihres Webbrowsers oder Betriebssystems können Ihnen erlauben, zu kontrollieren, wie Drittanbieter Cookies auf Ihrem Gerät speichern können.';
			case 'The third parties that provide these contents may store cookies on your device for their own purposes and interests, which we cannot control.':
				return 'Die Drittanbieter, die diese Inhalte bereitstellen, können Cookies für ihre eigenen Zwecke und Interessen auf Ihrem Gerät speichern, was wir nicht kontrollieren können.';
			case 'They are, however, commonly used to store a unique identifier for every individual user, so that our servers do not lose information on who you are while you are moving through the individual parts of our services.':
				return 'Sie werden jedoch häufig dazu verwendet, eine eindeutige Kennung für jeden einzelnen Nutzer zu speichern, damit unsere Server nicht die Information darüber verlieren, wer Sie sind, während Sie sich durch die einzelnen Bereiche unserer Dienste bewegen.';
			case 'They are transferred from our servers to your device through your web browser or app.':
				return 'Sie werden von unseren Servern über Ihren Webbrowser oder Ihre App auf Ihr Gerät übertragen.';
			case 'This information is not required and you can use parts of our services without this information. You have to give your consent before we collect this data, but some features may not be available without.':
				return 'Diese Information wird nicht zwingend benötigt und Sie können Teile unserer Dienste ohne diese Angabe nutzen. Sie müssen Ihre Genehmigung erteilen, bevor wir diese Daten erfassen, aber manche Funktionen sind ohne diese Daten möglicherweise nicht verfügbar.';
			case 'This information is not required and you can use parts of our services without this information. You may withdraw your consent for our collection of this data, but some features may not be available without.':
				return 'Diese Information wird nicht zwingend benötigt und Sie können Teile unserer Dienste ohne diese Angabe nutzen. Sie können Ihre Einwilligung zu unserer Erfassung dieser Daten widerrufen, aber manche Funktionen sind ohne diese Daten möglicherweise nicht verfügbar.';
			case 'This information is required for the operation of our services and its collection is therefore a condition for your use of our services.':
				return 'Diese Information wird für den Betrieb unserer Dienste benötigt und ihre Erhebung ist deshalb eine Bedingung für Ihre Nutzung unserer Dienste.';
			case 'This is possible either by using the “Unsubscribe” feature at the bottom of such emails that we may send, or by adjusting the settings in your account within our services, where applicable.':
				return 'Dies ist möglich, indem Sie entweder die „Abmelden“-Funktion am unteren Ende von solchen E-Mails benutzen, die wir senden könnten, oder durch das Ändern der Einstellungen in Ihrem Benutzerkonto innerhalb unserer Dienste, wo zutreffend.';
			case 'This means that parts of your personal information may temporarily remain on our servers even after deletion or termination of your use of our services.':
				return 'Dies bedeutet, dass Teile Ihrer persönlichen Informationen selbst nach Löschung oder nach Beendigung Ihrer Nutzung unserer Dienste vorübergehend auf unseren Servern bestehen bleiben können.';
			case 'This notification will include help on choices you may have regarding the transfer and treatment of your personal information.':
				return 'Diese Benachrichtigung wird Hilfe zu den Wahlmöglichkeiten beinhalten, die Sie möglicherweise im Hinblick auf die Übertragung und Behandlung Ihrer persönlichen Informationen haben.';
			case 'This notification will include help on choices you may have regarding the treatment of your personal information.':
				return 'Diese Benachrichtigung wird Hilfe zu den Wahlmöglichkeiten beinhalten, die Sie möglicherweise im Hinblick auf die Behandlung Ihrer persönlichen Informationen haben.';
			case 'This privacy policy governs your use of our services regardless of the domain names, operating systems, platforms or devices that are used to access the services, and regardless of whether such access is in connection with an account or not.':
				return 'Diese Datenschutzerklärung regelt Ihre Nutzung unserer Dienste, unabhängig von den Domain-Namen, Betriebssystemen, Plattformen oder Geräten, die für den Zugriff auf die Dienste genutzt werden, und unabhängig davon, ob solcher Zugriff in Verbindung mit einem Benutzerkonto geschieht oder nicht.';
			case 'This privacy statement (“privacy policy” or “policy”) is designed to help you better understand how and to what extent we collect, use, disclose, transfer and store your information.':
				return 'Diese Datenschutzrichtlinie („Datenschutzerklärung“ oder „Erklärung“) soll Ihnen helfen, besser zu verstehen, wie und in welchem Umfang wir Ihre Informationen erfassen, verwenden, offenlegen, übertragen und speichern.';
			case 'We advise you to verify the privacy practices of those third parties individually.':
				return 'Wir raten Ihnen, die Datenschutzpraktiken dieser Drittunternehmen individuell zu überprüfen.';
			case 'We always collect only the minimum amount of personal information necessary to provide our services to you, unless you choose to provide more such information voluntarily.':
				return 'Wir erheben immer nur die kleinstmögliche Menge an persönliche Informationen, die nötig ist, um unsere Dienste für Sie bereitstellen zu können, es sei denn, Sie entschließen sich freiwillig dazu, mehr solcher Informationen zu übertragen.';
			case 'We encourage you not to provide any personal information to those third parties before assuring yourself of proper privacy practices on their part.':
				return 'Wir empfehlen Ihnen, diesen Drittunternehmen keine persönlichen Informationen bereitzustellen, bevor Sie sich von angemessenen Datenschutzpraktiken seitens dieser Unternehmen überzeugt haben.';
			case 'We encourage you to give us, and, more generally, any provider of digital services, only the amount of data you are comfortable sharing.':
				return 'Wir ermutigen Sie dazu, uns, und allgemeiner jedem Anbieter von digitalen Dienstleistungen, nur die Menge an Daten bereitzustellen, mit der Sie sich wohlfühlen.';
			case 'We have no knowledge about and are not responsible for the way that those third parties handle any personal information which you provide to them yourself.':
				return 'Wir haben keine Kenntnis von und sind nicht verantwortlich für die Art und Weise, wie diese Drittunternehmen persönliche Informationen behandeln, die Sie ihnen selbst bereitstellen.';
			case 'We may retain and use your personal information and data as necessary to comply with our legal obligations, to resolve disputes, and to enforce our rights and agreements.':
				return 'Wir bewahren Ihre persönlichen Informationen und Daten möglicherweise so lange auf und nutzen diese, wie es erforderlich ist, um unsere gesetzlichen Verpflichtungen einzuhalten, Streitfälle beizulegen und unsere Rechte und Vereinbarungen durchzusetzen.';
			case 'We offer you simple ways to view, update or delete the data we have collected about you.':
				return 'Wir bieten Ihnen einfache Möglichkeiten, die Informationen, die wir über Sie erfasst haben, anzusehen, zu aktualisieren und zu löschen.';
			case 'We take the trust that you place in us very seriously.':
				return 'Wir nehmen das Vertrauen, das Sie uns entgegenbringen, sehr ernst.';
			case 'We use this information to personalize our services for you and to adjust them to your preferences.':
				return 'Wir nutzen diese Informationen, um unsere Dienste für Sie zu personalisieren und sie an Ihre Präferenzen anzupassen.';
			case 'We use this information to provide and fulfill the specific services that you explicitly request.':
				return 'Wir nutzen diese Informationen, um die konkreten Dienstleistungen, die Sie ausdrücklich anfordern, bereitstellen und erfüllen zu können.';
			case 'We use this information to provide customer service to you, to answer your questions and to communicate with you about your use of our services.':
				return 'Wir nutzen diese Informationen, um Ihnen Kundendienst anzubieten, Ihre Fragen zu beantworten und mit Ihnen über Ihre Nutzung unserer Dienste zu kommunizieren.';
			case 'We use this information to provide meaningful and unobtrusive advertising to you.':
				return 'Wir nutzen diese Informationen, um Ihnen aussagekräftige und unaufdringliche Werbung zeigen zu können.';
			case 'We want to help and will be happy to address your concerns.':
				return 'Wir möchten helfen und kümmern uns gerne um Ihr Anliegen.';
			case 'We will retain certain pieces of personal information for as long as you use our services, as long as your account exists, or as long as needed for us to be able to provide our services to you.':
				return 'Wir werden gewisse persönliche Informationen so lange aufbewahren, wie Sie unsere Dienste nutzen, wie Ihr Benutzerkonto besteht oder wie es nötig ist, um unsere Dienste für Sie bereitstellen zu können.';
			case 'You are welcome to make use of these settings and features of your web browser or operating system, but that may prevent our services from working correctly for you.':
				return 'Sie können gerne von diesen Einstellungen und Funktionen in Ihrem Webbrowser oder Betriebssystem Gebrauch machen, aber dies kann unsere Dienste daran hindern, korrekt für Sie zu funktionieren.';
			case 'You can reach us via email at:':
				return 'Sie erreichen uns per E-Mail unter:';
			case 'You may opt out of receiving any newsletters or promotional messages from us at any time.':
				return 'Sie können dem Empfang jeglicher Newsletter oder Werbenachrichten von uns jederzeit widersprechen.';
			case 'Your web browser or app then sends these small text files back to us whenever you access our services.':
				return 'Ihr Webbrowser oder Ihre App sendet diese kleinen Textdateien dann jedes Mal an uns zurück, wenn Sie auf unsere Dienste zugreifen.';
			case 'Your web browser or operating system usually provides means to delete such data currently stored on your device.':
				return 'Ihr Webbrowser oder Betriebssystem bietet üblicherweise Möglichkeiten an, solche Daten, die zurzeit auf Ihrem Gerät gespeichert sind, zu löschen.';
			case 'You should never disclose your authentication information to any third party and you should notify us immediately of any unauthorized use of your account.':
				return 'Sie sollten Ihre Informationen zur Authentifizierung niemals Dritten preisgeben und Sie sollten uns unverzüglich über jegliche unberechtigte Nutzung Ihres Benutzerkontos benachrichtigen.';
			case 'You therefore consent to our use of cookies and related technologies when using our services.':
				return 'Sie erklären sich deshalb mit unserer Nutzung von Cookies und ähnlichen Technologien einverstanden, wenn Sie unsere Dienste nutzen.';
			case 'You will be notified via a prominent notice within our services or by email to the primary email address specified in your account at least %d days before any such transfer of your personal information.':
				return 'Sie werden durch eine auffällige Ankündigung innerhalb unserer Dienste oder per E-Mail an die primäre E-Mail-Adresse, die in Ihrem Benutzerkonto hinterlegt ist, mindestens %d Tage vor einer solchen Übertragung Ihrer persönlichen Informationen benachrichtigt.';
			case 'You will continue to receive essential, non-promotional messages regarding your account, such as technical notices, order confirmations, or other service-related messages, which are required for us to be able to provide our services to you.':
				return 'Sie werden weiterhin grundlegende Nachrichten bezüglich Ihres Benutzerkontos erhalten, die nicht der Werbung dienen, wie etwa technische Mitteilungen, Auftragsbestätigungen oder andere dienstbezogene Nachrichten, die nötig sind, damit wir Ihnen unsere Dienste bereitstellen können.';
			case 'Your rights':
				return 'Ihre Rechte';
			case 'Except as limited under applicable law, you have the following rights with regard to your personal data:':
				return 'Soweit nicht durch anwendbares Recht eingeschränkt, haben Sie im Hinblick auf Ihre persönlichen Daten die folgenden Rechte:';
			case 'If you have any questions regarding the protection of your data, your rights, or how to exercise them, please contact us.':
				return 'Wenn Sie irgendwelche Fragen im Hinblick auf den Schutz Ihrer Daten, Ihre Rechte oder deren Ausübung haben, kontaktieren Sie uns bitte.';
			case 'Upon verification of your identity, we will respond to your request within a reasonable period of time.':
				return 'Nach Überprüfung Ihrer Identität werden wir innerhalb eines angemessenen Zeitraumes auf Ihre Anfrage antworten.';
			case 'If you are unsatisfied with our response or with the way we are processing your personal data, you may contact your local data protection authority.':
				return 'Falls Sie mit unserer Antwort oder mit der Art und Weise, wie wir Ihre persönlichen Daten verarbeiten, unzufrieden sind, können Sie Ihre örtliche Datenschutzbehörde kontaktieren.';
			case 'You are free to file a complaint with the data protection authority.':
				return 'Es steht Ihnen frei, bei der Datenschutzbehörde eine Beschwerde einzulegen.';
			case 'You may also contact the data protection authority that is responsible for us:':
				return 'Sie können auch die Datenschutzbehörde kontaktieren, die für uns zuständig ist:';
			default:
				return parent::translateUnformatted($text);
		}
	}

}
