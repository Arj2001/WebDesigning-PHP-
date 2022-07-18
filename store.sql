-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 09:38 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `uname`, `email`, `age`, `password`, `created_date`) VALUES
(1, 'admin', 'admin', '1234@gmail.com', 19, 'admin', '2021-10-09 09:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `status` int(11) NOT NULL,
  `icon` varchar(148) NOT NULL,
  `small_desc` text NOT NULL,
  `desc` longtext NOT NULL,
  `price` decimal(50,2) NOT NULL,
  `free` tinyint(1) NOT NULL,
  `file` varchar(248) NOT NULL,
  `size` int(11) NOT NULL,
  `version` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `dir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `name`, `status`, `icon`, `small_desc`, `desc`, `price`, `free`, `file`, `size`, `version`, `date`, `dir`) VALUES
(18, 'Git123', 1, '../../apps/CoWpOTBkMo/images/git.png', 'Version Control ', '<p>version control</p>', '0.00', 0, '../../apps/CoWpOTBkMo/Git-2.33.0.2-64-bit.exe', 50101024, '2.03', '2021-11-28 07:20:01', '../../apps/CoWpOTBkMo'),
(19, 'Avast', 1, '../../apps/W5UoAoKsFE/images/avast.png', 'Free and powerful security tool', '<h2><strong>Free and powerful security tool</strong></h2><p>Avast Free Antivirus is a robust PC protection tool that you can use for free. Designed for Windows 10 and below operating systems, the software provides users with a range of features, including antivirus, password manager, network scanner, and malicious URL filter. The free program isn’t limited to Windows but is also available for download on <a href=\"https://filehippo.com/mac/download_avira_free_antivirus_for_mac/\">macOS</a> computers.</p><h3><strong>What is Avast Free Antivirus?</strong></h3><p>When you download Avast Antivirus on your computer, you get a basic virus scanner with some additional features. Available for free, the program <strong>searches for malware, spyware, and viruses </strong>by scanning your PC, network, and internet browsers. It can also help users in detecting malicious add-ons, old software, weak passwords, and more.&nbsp;</p><h3><strong>Comes with a user-friendly interface</strong></h3><p><strong>Avast Free Antivirus download</strong> comes with a clean and simple interface. The primary window of the software shows a scan button, which once clicked, searches for all threats and displays the result of the scan. With the help of the right-side panel, you can <strong>check the status, privacy, protection, and performance</strong> of your PC.&nbsp;</p><p>At the top of the software window, you will find only two icons - one for notifications and the second for the menu. You can click on any of the two to easily <strong>customise the program </strong>as per your preference. This section also lets you turn some features off as well. Overall, the tool offers an interface that is <strong>suitable for beginners</strong>.</p><h3><strong>Is Avast Free a good antivirus?</strong></h3><p>Avast Free Antivirus is one of the few antivirus tools that offer enhanced security without putting a price tag on its services. The free program offers <strong>real-time protection</strong> that keeps a check on <strong>downloaded files, emails, P2P transfers, instant messages, and online browsing</strong>. Once installed, the free antivirus software can also scan and detect malicious browser plugins.&nbsp;</p><h3><strong>Scans your network</strong></h3><p>Apart from scanning your entire PC to provide robust protection, <strong>Avast Free Antivirus download</strong> also scans your home or WiFi network. Once launched, the tool searches the network to identify vulnerabilities that may cause you to lose your private data or sensitive information. It also scans emails, messages, and files arriving via the network to <strong>protect your computer from cyber threats and attacks</strong>.&nbsp;</p><h3><strong>Blocks pop-ups</strong></h3><p>One of the best features available in Avast Free Antivirus is called Do Not Disturb or DND mode. When you activate this function, it’ll stop all pop-ups anytime you’re using an app on fullscreen. This way, you can easily <strong>play video games or watch movies without getting interrupted</strong> in the middle. You can use this feature to pause pop-up notifications for all software updates and virus alerts.&nbsp;</p><h3><strong>Offers real-time scanning</strong></h3><p>With the help of real-time scanning, you can rest knowing Avast Free Antivirus will continue working even when you don’t. This is because it comes with an <strong>inbuilt behaviour scanner</strong> that keeps track of all programs and tools to detect any behavioural changes. These could be signs that alert the <strong>free antivirus software</strong> of attempts being made by a virus to manipulate or modify PC apps.&nbsp;</p><h3><strong>Does Avast remove viruses?</strong></h3><p>Yes, the free antivirus program is <strong>capable of detecting as well as removing all viruses</strong> that it finds on your computer. Moreover, the company that designed the tool states that the software won’t just detect and delete malware, but will also <strong>stop them from infecting your system again</strong>. It also offers real-time threat protection by scanning your network, files, and browsers for any threats.&nbsp;</p><h3><strong>How long does Avast free antivirus last?</strong></h3><p>The free anti-malware tool doesn’t come with a yearly subscription model that you may need to pay for after a year. Instead, the program makes all its basic <strong>features available for free </strong>to its users. That said, it does offer a few premium plans that come with advanced security measures as well as additional features. The premium plans are quite reasonable and last for a year before asking you to pay for updates.&nbsp;</p><h3><strong>Are there any alternatives?</strong></h3><p>While Avast is one of the best <strong>free antivirus software</strong> programs available in the market, it does have features that users may find limited. Therefore, if you’d like to check out alternatives, you should explore <a href=\"https://filehippo.com/download_mcafee-total-protection/\"><strong>McAffee Total Protection</strong></a>,<a href=\"https://filehippo.com/download_norton_360/\"> <strong>Norton 360</strong></a>, and<a href=\"https://filehippo.com/download_kaspersky_antivir/\"> <strong>Kaspersky Antivirus</strong></a>.&nbsp;</p><h3><strong>Should I download Avast Free Antivirus?</strong></h3><p>If you’re looking for a simple and easy-to-use free antivirus tool, you should download Avast Free Antivirus. As the name suggests, the program is free to use and comes with a range of features that help detect and delete viruses, spyware, ransomware, and malware. It also keeps a constant check on the apps installed on your PC to highlight any new or malicious behaviour.&nbsp;</p><p>Additionally, the program can also scan your network to detect any threats and identify vulnerable points. The latter could be anything from weak passwords to default settings. Once threats are detected and removed, Avast prevents them from infecting your PC again. The software also searches for threats on your email, files, P2P transfers, and instant texts, to ensure your overall security.</p><h3><strong>Technical</strong></h3><p><strong>Title:</strong></p><p>Avast Free Antivirus 20.10.2442 for Windows</p><p><strong>Requirements:</strong></p><ul><li>Windows 8.1,</li><li>Windows 10,</li><li>Windows 8,</li><li>Windows 7</li></ul><p><strong>Language:</strong></p><p>English</p><p><strong>Available languages:</strong></p><ul><li>English,</li><li>German,</li><li>Spanish,</li><li>French,</li><li>Italian,</li><li>Japanese,</li><li>Polish,</li><li>Chinese</li></ul><p><strong>License:</strong></p><p>Free</p><p><strong>Date added:</strong></p><p>Tuesday, May 21st 2019</p><p><strong>Author:</strong></p><p>Avast Software</p><p><a href=\"http://www.avast.com/\">http://www.avast.com/</a></p><p><strong>SHA-1:</strong></p><p>0d04d52b6c9aa0c826ac2ada44d768697fcc2ced</p>', '0.00', 0, '../../apps/W5UoAoKsFE/avast.exe', 234280, '3.0.16', '2021-11-28 17:57:16', '../../apps/W5UoAoKsFE'),
(20, 'Vlc Media Player', 1, '../../apps/CCu4Gsoa2N/images/VLC.png', 'All in one media player', '<h2><strong>Cross-platform multimedia player</strong></h2><p>VLC Media Player is a <strong>free media player</strong> that lets you play audio and video content on computers, laptops, mobile phones, and tablets. The freeware lets you <strong>launch different media types</strong>: devices, discs, files, and streams. The versatile software works with Audio CDs, DVDs, streaming protocols, and VCDs. VLC has plenty of <strong>built-in codecs&nbsp;</strong>that let you quickly open different file formats: MP3, MKV, etc.</p><h3><strong>Is VLC Media Player safe?</strong></h3><p>VLC Media Player is <strong>safe&nbsp;to download and install </strong>on Android, Apple iOS, Linux, and Microsoft Windows 32-bit and 64-bit operating systems. The application can additionally be opened on Apple TV.&nbsp;</p><p>Developed and released by the VideoLAN non-profit organisation, VLC does not use adware nor spyware to track your data. You can watch content in an <strong>advertisement free</strong> app that keeps your <strong>personal information</strong> <strong>secure</strong>.</p><p>If you want to ensure that your private data and devices are safe, then you will want to be sure that the files that you open with it are not malicious. While the powerful player does not inherently contain malware, the software can open a large variety of file types that may be dangerous. There are times that the app<strong> will not open a corrupted file</strong>.</p><h3><strong>Is VLC safe for Windows 10?</strong></h3><p>VLC Media Player is <strong>compatible</strong> with Windows 10, Windows 8, Windows 7, Windows Vista, Windows XP, etc. The official program is completely safe to download and install on all of the operating systems.&nbsp;</p><p>The program is an <strong>open source</strong> project that lets you further develop the platform in the <strong>C</strong>, <strong>C++</strong>, and <strong>Objective-C</strong> programming languages. While the original VideoLAN project is a secure player, there may be variations from different developers that are not safe to download and install on your PC.</p><h3><strong>What is VLC Media Player?</strong></h3><p>VLC Media Player is one of the <strong>most popular media players </strong>in the world because the system can play a lot of file formats in a <strong>clean user interface</strong> that is filled with features. It offers multiple recording options. It can work as a <strong>screen recorder&nbsp;</strong>to let you record your entire desktop screen. You can also use it as a <strong>webcam recorder</strong> to record videos on your camera.&nbsp;</p><p>Both of recording settings are within the ‘<strong>Media</strong>’ tab in the ‘Open Capture Device…’ setting. You will need to adjust the settings within the ‘<strong>Capture Device</strong>’ tab of the window that appears. You will choose ‘Desktop’ to record your screen and ‘<strong>DirectShow</strong>’ to use your camera as a recorder.</p><p>You can easily take <strong>screenshots&nbsp;</strong>of the video you’re watching by right clicking and hovering above ‘Video’ in the context menu to click on ‘<strong>Take Snapshot</strong>’. VLC is a <strong>converter&nbsp;</strong>that lets you change audio and video file formats. You can convert files by going to the ‘Media’ tab and selecting ‘Convert / Save’.</p><p>A window will appear where you can include the files that you want to convert from the browser by clicking on the ‘<strong>Add</strong>…’ button. You can click on the ‘<strong>Convert / Save</strong>’ button at the bottom of the screen when you have selected your preferred files to transform. There will be a list of <strong>file formats</strong> within the dropdown menu on the next screen.&nbsp;</p><p>You can choose the <strong>format and destination to save</strong> the file to. If you are ready to begin the conversion process, then you can press the ‘<strong>Start’</strong> button at the bottom of the window. The converted content will be in the folder that you selected.</p><h3><strong>Is VLC better than Windows Media Player?</strong></h3><p>GOM Player, Potplayer, KMPlayer, MX Player, Media Player Classic Home Cinema, Windows Media Player, and 5KPlayer are alternative applications that can play multimedia files. Potplayer has the most appealing user interface that is organised in an easy-to-use way. MPC-HC and Windows Media Player have similar user interfaces.</p><p>5KPlayer focuses on various streaming capabilities for audio and video content. Additionally, KMPlayer, MX Player, Potplayer, and VLC let you <strong>stream videos</strong> within their platforms. All of the apps are free to download and install.</p><h3><strong>The classic multimedia player</strong></h3><p>VLC Media Player is a converter, downloader, and player that lets you <strong>conveniently&nbsp;</strong>experience audio and video content. It is <strong>lightweight</strong> and does not use a lot of resources on your device. You can<strong> customize </strong>your user experience with the features the VLC offers: skin editor, watermarks, etc.</p><h3><strong>What is the latest version of VLC Media Player?</strong></h3><p>The developers <strong>consistently update</strong> the project. You can view their most recent software update on their official website.</p><h3><strong>Technical</strong></h3><p><strong>Title:</strong></p><p>VLC Media Player 64-bit 3.0.12 for Windows</p><p><strong>Requirements:</strong></p><ul><li>Windows XP,</li><li>Windows 10,</li><li>Windows 8,</li><li>Windows 7,</li><li>Windows Vista</li></ul><p><strong>Language:</strong></p><p>English</p><p><strong>Available languages:</strong></p><ul><li>English,</li><li>German,</li><li>Spanish,</li><li>French,</li><li>Italian,</li><li>Japanese,</li><li>Polish,</li><li>Chinese</li></ul><p><strong>License:</strong></p><p>Free</p><p><strong>Date added:</strong></p><p>Wednesday, June 12th 2019</p><p><strong>Author:</strong></p><p>VideoLAN.org</p><p><a href=\"https://www.videolan.org/\">https://www.videolan.org</a></p><p><strong>SHA-1:</strong></p><p>773809254abc40df37dce4d14015745074d5caa8</p>', '0.00', 0, '../../apps/CCu4Gsoa2N/vlc-3.0.16-win64.exe', 42762464, '3.0.16', '2021-12-18 15:46:22', '../../apps/CCu4Gsoa2N'),
(22, 'Spotify', 1, '../../apps/SC2hEdjdov/images/Spotify.png', 'Music All you want', '<h2><strong>A free and powerful music player</strong></h2><p>Spotify is a free <strong>music streaming service</strong> with a vast collection of songs, playlists, audiobooks, speeches, poetry readings, artist radio, and more! It features <strong>algorithm-based recommendations</strong>, social media integration, on-demand streaming, and even has an option to play files located on your computer. The music app isn’t limited to Windows, however, as it is also available for download on other platforms including <strong>Android</strong> and <strong>macOS</strong> devices.&nbsp;</p><h3><strong>What is so special about Spotify?</strong></h3><p>Nowadays, many applications offer <strong>on-demand streaming</strong>. What makes Spotify special is the fact that it offers <strong>over 50 million songs</strong> that you can play from start to finish, without paying anything! The free music application for Windows also offers audiobooks, comedy shows, podcasts, radio stations, speeches, poetry readings, and a lot more.</p><p>That said, the catalogue of Spotify, while comprehensive, does have a few gaps. You may not find all songs or albums of an artist, and may even struggle to find some famous bands. But, to counteract this drawback, Spotify <strong>offers users an Artist Radio station</strong>, which makes finding similar artists or songs easy. Besides, you can also use this section to discover more information about your favourite musician.</p><h3><strong>Intuitive and user-friendly interface</strong></h3><p>Spotify’s free desktop application has a clean and simple interface with <strong>three navigation options</strong> - Home, Browse, Discover. The primary page consists of a horizontal list of recommended playlists unique to each user. The section below consists of a list of recently played songs, along with a bar using which you can control the playback.&nbsp;</p><p>Similar to Home, the Browse tab offers various options using which you can <strong>look for songs based on their popularity</strong>, release date, genre, and more. This section also includes music categories such as Hip-Hop, Indie, Rock, Pop, Summer, Chill, Dinner, that users can explore.&nbsp;</p><p><strong>Spotify download</strong> also includes a Discover tab, which <strong>uses an algorithm to show recommendations</strong>. The more you listen to music using this section, the better it gets! At the top of the page, you <strong>get access to the Discover Weekly Playlist</strong> that not only includes songs that you have been listening to but also adds a list of new songs with the same vibe.&nbsp;</p><h3><strong>Access your favourite songs quickly</strong></h3><p><strong>Spotify player for Windows </strong>features a small heart icon next to the name of any song, podcast, or audiobook, among others. To add any of these to your library (Your Songs), all you have to do is click on the heart icon, and the content will instantly get saved.</p><h3><strong>Listen to artist radio</strong></h3><p><strong>Finding new music</strong> is easier with Spotify! This is because the tool also <strong>includes a Radio </strong>section that shows a variety of playlists. While some of these are new, others include songs similar to your favourite albums or artists. Moreover, if you’re listening to a particular song and want to <strong>discover a playlist with a similar style</strong>, all you have to do is click on the available radio icon.&nbsp;</p><h3><strong>Integrate with social media</strong></h3><p><strong>Spotify download</strong> offers additional functionality that makes listening to music a lot more fun. If you complete Spotify login using your <strong>Facebook</strong> account, the right-side panel shows a list of your friends along with the music they’ve been exploring. Similarly, your <strong>music history gets broadcasted </strong>to your friends, which you can easily avoid by selecting the private session function.&nbsp;</p><h3><strong>Play local files</strong></h3><p>An advantage of using Spotify on your Windows instead of using Spotify web is that the former lets you <strong>play files stored on your computer</strong>. The program also <strong>supports a range of file formats</strong>, so you can listen to songs irrespective of whether they’re available in MP4, M4P, and MP3. The only limitation is that the desktop app isn’t able to play M4A files.&nbsp;</p><h3><strong>Is Spotify for free?</strong></h3><p>Yes, the basic plan of Spotify is completely free, but it has its limitations. The free version lets users listen to songs at 160kbps, <strong>comes with both banner and audio ads</strong>, and doesn’t offer download functionality. Other plans offered by the music streaming provider are Spotify Premium, Family Plan, Spotify Duo, Student Plan, and more. You can try any of these plans with the help of <strong>a free trial period</strong>.</p><h3><strong>What is the best alternative to Spotify?</strong></h3><p>These days, there are numerous music streaming services available, all with their own unique set of features. However, some of the best alternatives to Spotify would be <strong>Apple iTunes Music</strong>, <strong>VLC Media Player</strong>, and <strong>KMPlayer</strong>.&nbsp;</p><h3><strong>Should I download Spotify?</strong></h3><p>If you’re looking for <strong>a powerful music player</strong> that helps you discover songs and podcasts, you should download Spotify. The free version of the app features playlist sharing, algorithm-based recommendations, on-demand playback, social media integration, and a lot more!</p><h2><strong>Technical</strong></h2><p><strong>Title:</strong></p><p>Spotify 1.1.74.631 for Windows</p><p><strong>Requirements:</strong></p><ul><li>Windows 8.1,</li><li>Windows 11,</li><li>Windows 10,</li><li>Windows 8,</li><li>Windows 7</li></ul><p><strong>Language:</strong></p><p>English</p><p><strong>Available languages:</strong></p><ul><li>English,</li><li>Arabic,</li><li>Chinese,</li><li>Czech,</li><li>Danish,</li><li>German,</li><li>Spanish,</li><li>Finnish,</li><li>French,</li><li>Italian,</li><li>Japanese,</li><li>Dutch,</li><li>Norwegian,</li><li>Polish,</li><li>Portuguese,</li><li>Russian,</li><li>Swedish,</li><li>Turkish</li></ul><p><strong>License:</strong></p><p>Free</p><p><strong>Date added:</strong></p><p>Monday, June 17th 2019</p><p><strong>Author:</strong></p><p>Spotify Ltd.</p><p><a href=\"https://www.spotify.com/\">https://www.spotify.com</a></p><p><strong>SHA-1:</strong></p><p>248e39255d9503630fdad30bf8c94acfa746e44b</p>', '0.00', 0, '../../apps/SC2hEdjdov/SpotifySetup.exe', 726552, '1.1.72.439', '2021-12-31 08:46:22', '../../apps/SC2hEdjdov'),
(26, 'Team viewer', 1, '../../apps/5HED6cjC9r/images/Team Viewer.png', 'Remote acces tool ', '<h2><strong>A remote desktop application</strong></h2><p>&nbsp;</p><p><strong>TeamViewer</strong> is safe, free, proprietary software that allows for <strong>desktop sharing</strong>, <strong>remote control</strong>, <strong>online meetings</strong>, and <strong>file transfer</strong>. It’s a comprehensive and secure PC access application that is highly recommended for IT Managers. The software is about allowing employees to collaborate seamlessly through their computers.</p><h3><strong>Features for virtual collaboration</strong></h3><p>TeamViewer offers a <strong>remote access solution</strong> that can be expanded so that multiple people can be working through their computers, collaboratively. The software offers a virtual alternative so that brainstorming sessions and meetings can happen between team members without having to gather anywhere physically.</p><p>The software has impressive <strong>multi-platform capabilities</strong>, an advanced security model, and offers a comprehensive set of remote access features.</p><h3><strong>Installation</strong></h3><p>To <strong>install TeamViewer</strong> on both host and guest systems, you have to install a small 23 MB application. You can also run the program through web-based control, without any installation required. You’ll be asked if you want to add a TeamViewer <strong>printer driver</strong> for <strong>remote printing</strong>.</p><p>Users can also add a TeamViewer VPN for added security. Another option you’ll have available is to integrate the <strong>interface</strong> with <strong>Microsoft Outlook</strong>. In order to set up the program, you’ll need to sign up for an account.</p><p>The process is relatively straightforward and does not require much time. Once the app is installed on both ends, you’ll be able to establish a link and access the <strong>remote computer</strong> as well as the program’s comprehensive feature set.</p><h3><strong>Interface</strong></h3><p>The <strong>TeamViewer interface</strong> mimics <strong>Microsoft Remote Desktop</strong> in many ways. It’s clean and easy to navigate. It provides a central control bar where you’ll have easy access to any actions. You’ll see a small taskbar window that pops up and users to access all of the tools. You’ll also be able to see who is controlling the computer.</p><p>All of the activity on the account is logged for reporting through the application’s <strong>web portal</strong>. All the registered endpoints are maintained there. The web portal also has a straightforward design, with the menus on the left and the information panels on the right.</p><h3><strong>What is TeamViewer used for?</strong></h3><p>As far as remote access tools go, this program offers a comprehensive set of features. You can easily work with others by using the chat feature with notes, <strong>VoIP</strong> or phone, annotating the screen, and inviting others into a session.</p><p>The app can record audio and video. You can even initiate voice calls with your connection partner. You can also use TeamViewer to access <strong>remote scripts</strong>, capture <strong>screenshots</strong> and, <strong>transfer files</strong> up to 2GBs. For added defence, you can use it as a <strong>VPN</strong> for secure links. If you added on Outlook integration, you\'d be able to schedule meetings and webinars.</p><p>Users can also make telephone, VOIP, and <strong>video calls</strong> and create presentations for easy sharing. Instead of having to huddle around a computer physically, this virtual desktop allows you to do this from your own respective system.</p><p>A remarkable aspect of this <strong>remote connection tool</strong> is that you can build on to customise the system to fit your organisation’s needs. The system supports cross-platform access across <strong>Windows</strong>, Linux, <strong>Mac</strong>, Chrome OS, Android, Windows Mobile, iOS, and Blackberry devices.</p><p>TeamViewer has a top-of-the-line <strong>multi-monitor support</strong> system where you can see each monitor individually as a super desktop; this makes it easy to navigate between sessions. For the workplace, this is convenient, considering you can have many sessions open to all of the computers that you need to control.</p><h3><strong>Security</strong></h3><p>The software has a complex and thorough security model. All traffic uses an <strong>AES 256-bit encryption</strong> and an https/SSL, which means that it is difficult for anyone to intercept unencrypted data passed over the internet or LAN. There’s also a 2048-bit <strong>RSA private/public key</strong> that’s exchanged between the sessions and the centralised master servers.</p><p>TeamViewer also has <strong>two-factor authentication</strong>. You can choose ‘Trusted devices’ for lockdown solutions and add security. Any unusual activity triggers a <strong>password reset</strong> only via the email of the account owner.</p><h3><strong>Software plans and costs</strong></h3><p>The advanced tools that TeamViewer offers don’t come without a cost. There are three different plans that you can choose from. The plans are billed annually, based on a monthly fee. If you need to add mobile capabilities, you’ll be required to purchase an additional package that’s charged annually.</p><p>The <strong>TeamViewer free</strong> ‘Personal Plan’ is designed with minimal remote access features. You’ll have access to capabilities that will allow you to connect with friends and family, but file sharing and other tools are limited.</p><p>The ‘Single User’ plan is a solid option. You’ll have access between one user and unlimited computers, though all with only one concurrent session. The ‘Multi-User’ account offers a <strong>premium license</strong> and will give you similar access, for multiple licensed users.</p><p>The team plan is a bit expensive, but with a corporate license. This license is similar to the others but allows for three concurrent sessions and more remote capabilities. Three as a maximum number of concurrent sessions is rather low and doesn’t fit the needs of those who need to scale up. If IT managers need access to many sessions at once, they’ll have to pay to upgrade.</p><p>Those seeking a free alternative to TeamViewer should look into <strong>AnyDesk</strong>, <strong>Chrome Remote Desktop</strong>, or <strong>LogMeIn</strong>. Many of these programs are not as powerful, but they are much cheaper.</p><h3><strong>The standard in remote control</strong></h3><p>TeamViewer offers some of the best <strong>remote access solutions</strong> available, regardless of its few drawbacks. In terms of functionality and performance, the tool makes it easy to work across devices and platforms. It’s designed to bring workers together and can do just that. Connect with remote computers and collaborate online.</p><p>Despite its hefty price-tag, this program remains the leader in global remote connectivity solutions. If you’re looking to test out the program, you can sign-up for the TeamViewer free plan for personal use. The latest version offers enhanced communication, security, and file-transfer features. There is an update released annually.</p><h2><strong>Technical</strong></h2><p><strong>Title:</strong></p><p>TeamViewer 15.25.8 for Windows</p><p><strong>Requirements:</strong></p><ul><li>Windows 8.1,</li><li>Windows XP,</li><li>Windows 8,</li><li>Windows 11,</li><li>Windows Vista,</li><li>Windows 10,</li><li>Windows 7</li></ul><p><strong>Language:</strong></p><p>English</p><p><strong>Available languages:</strong></p><ul><li>English,</li><li>Czech,</li><li>Danish,</li><li>German,</li><li>Spanish,</li><li>Finnish,</li><li>French,</li><li>Italian,</li><li>Japanese,</li><li>Korean,</li><li>Dutch,</li><li>Norwegian,</li><li>Polish,</li><li>Portuguese,</li><li>Russian,</li><li>Swedish,</li><li>Turkish,</li><li>Chinese</li></ul><p><strong>License:</strong></p><p>Free</p><p><strong>Date added:</strong></p><p>Thursday, June 6th 2019</p><p><strong>Author:</strong></p><p>TeamViewer GmbH</p><p><a href=\"https://www.teamviewer.com/\">https://www.teamviewer.com</a></p><p><strong>SHA-1:</strong></p><p>0ab341ae0fff2b9c9a904d3fc57573c28711a5b2</p>', '200.00', 1, '../../apps/5HED6cjC9r/TeamViewer_Setup_x64.exe', 35080496, '2.03', '2022-01-09 13:27:39', '../../apps/5HED6cjC9r'),
(27, 'Iruin', 1, '../apps/OCP49vQwib/images/Iruin.png', 'Web cam app', '<p>web cam</p>', '0.00', 0, '../apps/OCP49vQwib/WinWebcam-2.6.8.exe', 6962240, '2.6.8', '2022-01-13 06:09:54', '../apps/OCP49vQwib'),
(28, 'Bootstrap ', 1, '../apps/wAcLWZKvvh/images/bootstrap.png', 'Free css tool', '<h2>BootStrap</h2><p>It is a complete solution for the easy use of CSS elements. User can create their own website with very little CSS knowledge with small device support.</p><p><a href=\"bootstrap.com\">bootstrap link</a></p><p><a href=\"w3schoools.org\">study bootstrap</a></p>', '50.00', 1, '../apps/wAcLWZKvvh/Bootstrap Studio 4 Setup (64bit).exe', 54243120, '4', '2022-01-16 17:01:07', '../apps/wAcLWZKvvh'),
(29, 'nmap', 1, '../apps/wLL0k7afXs/images/app.png', 'Scannig', '<p>sdfgsdgdsgds</p>', '0.00', 0, '../apps/wLL0k7afXs/nmap-7.92-setup.exe', 28644568, '7.92', '2022-03-23 04:13:48', '../apps/wLL0k7afXs');

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `dev_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`dev_id`, `user_id`) VALUES
(1, 8),
(2, 16),
(3, 10),
(4, 18);

-- --------------------------------------------------------

--
-- Table structure for table `dev_app`
--

CREATE TABLE `dev_app` (
  `dev_app_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dev_app`
--

INSERT INTO `dev_app` (`dev_app_id`, `user_id`, `app_id`) VALUES
(5, 10, 27),
(6, 18, 28),
(7, 10, 29);

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `fav_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`fav_id`, `app_id`, `user_id`) VALUES
(11, 22, 16),
(12, 20, 16),
(16, 18, 16),
(17, 19, 16),
(18, 18, 8),
(19, 18, 13),
(20, 26, 13),
(21, 27, 10),
(23, 22, 18),
(24, 27, 18),
(25, 18, 18),
(26, 19, 18),
(27, 26, 18),
(28, 18, 9),
(29, 22, 10),
(30, 20, 10),
(31, 18, 10);

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `user_rating` int(11) NOT NULL,
  `user_review` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_id`, `app_id`, `user_rating`, `user_review`, `datetime`) VALUES
(20, 17, 20, 2, '', '2022-01-03 10:50:10'),
(21, 17, 20, 2, '', '2022-01-03 11:08:04'),
(22, 17, 20, 4, 'wsdfdfs', '2022-01-03 11:25:24'),
(23, 17, 20, 5, 'sfdgsgs', '2022-01-03 11:25:29'),
(24, 17, 22, 3, 'hr', '2022-01-03 18:35:54'),
(25, 17, 19, 5, 'good', '2022-01-03 18:48:37'),
(26, 10, 20, 3, 'not bad\n', '2022-01-03 19:17:55'),
(27, 10, 18, 5, 'best app\n', '2022-01-04 06:40:18'),
(28, 8, 20, 3, 'I like it\n', '2022-01-04 15:26:06'),
(29, 8, 19, 4, 'blocked a bunch of virus for me\n', '2022-01-04 15:26:36'),
(30, 8, 18, 5, 'good lord\n\n', '2022-01-04 15:27:34'),
(31, 8, 22, 4, 'best music place\n', '2022-01-04 15:28:29'),
(32, 17, 18, 3, 'bad', '2022-01-05 05:40:46'),
(33, 13, 25, 1, 'very bad\n', '2022-01-09 12:24:54'),
(34, 16, 26, 4, 'good ', '2022-01-09 13:28:06'),
(35, 18, 22, 5, 'Wonderful app', '2022-01-16 16:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `sold`
--

CREATE TABLE `sold` (
  `pay_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sold`
--

INSERT INTO `sold` (`pay_id`, `user_id`, `app_id`) VALUES
(1, 8, 26),
(4, 13, 26),
(5, 18, 26),
(6, 10, 26);

-- --------------------------------------------------------

--
-- Table structure for table `stars`
--

CREATE TABLE `stars` (
  `id` int(11) NOT NULL,
  `rateIndex` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stars`
--

INSERT INTO `stars` (`id`, `rateIndex`) VALUES
(4, 3),
(5, 4),
(6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `password` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `status`, `email`, `name`, `age`, `password`, `created_date`) VALUES
(1, 'ariamanu91', 1, 'arjunraju122001@gmail.com', 'Aria Manu', 20, '123456789', '2021-10-03 06:50:10'),
(2, 'dsjlfjasdj', 1, 'mau91@jfdfa', 'sdkaljf', 23, '1234567', '2021-10-03 06:52:16'),
(7, 'ariamanu911212', 1, 'womeyit788@relumyx.com', 'hello', 4, 'aadfda', '2021-10-03 09:20:50'),
(8, 'arunraju', 1, '1234@gamil.com', 'arun', 15, '1234', '2021-10-03 19:13:26'),
(9, 'admin', 1, 'adminemail@gamil.com', 'admin', 20, '123456789', '2021-10-05 09:22:26'),
(10, 'Tuttu123', 1, 'tuttu@pottan.com', 'Tuttu Kuttan', 14, '1234567890', '2021-10-07 19:02:53'),
(12, 'ariamanu9112', 1, 'tuttu123@gmail.com', 'Tuttu', 45, '456789123', '2021-10-10 06:08:36'),
(13, 'georgemani', 1, 'goergemathew@gmail.com', 'George', 45, '1234567890', '2021-10-10 06:09:45'),
(14, 'ariamanu9123', 1, 'goergemathew123@gmail.com', 'hello', 23, '45612378921', '2021-10-10 06:10:38'),
(15, 'ariamanu91232', 1, 'goergemathew1213@gmail.com', 'hello', 23, '45612378921', '2021-10-10 06:11:22'),
(16, 'oka123', 1, 'okay@md.com', 'Oka', 12, 'ok1234567', '2021-10-10 06:12:34'),
(17, 'ar22345', 1, 'tuttu23@gmail.com', 'Arun Raju', 24, 'pass1234', '2022-01-01 07:10:21'),
(18, 'mani', 1, 'manumani@gmail.com', 'Manu Mani', 20, '12345678', '2022-01-16 16:49:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`uname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`dev_id`);

--
-- Indexes for table `dev_app`
--
ALTER TABLE `dev_app`
  ADD PRIMARY KEY (`dev_app_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`fav_id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `sold`
--
ALTER TABLE `sold`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `stars`
--
ALTER TABLE `stars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `developer`
--
ALTER TABLE `developer`
  MODIFY `dev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dev_app`
--
ALTER TABLE `dev_app`
  MODIFY `dev_app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sold`
--
ALTER TABLE `sold`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stars`
--
ALTER TABLE `stars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
