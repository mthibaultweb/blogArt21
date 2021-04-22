-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 03 mars 2021 à 20:14
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blogart21`
--

-- --------------------------------------------------------

--
-- Structure de la table `angle`
--

DROP TABLE IF EXISTS `angle`;
CREATE TABLE IF NOT EXISTS `angle` (
  `numAngl` char(8) NOT NULL,
  `libAngl` char(60) DEFAULT NULL,
  `numLang` char(8) NOT NULL,
  PRIMARY KEY (`numAngl`),
  KEY `ANGLE_FK` (`numAngl`),
  KEY `FK_ASSOCIATION_3` (`numLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `angle`
--

INSERT INTO `angle` (`numAngl`, `libAngl`, `numLang`) VALUES
('ANGL0101', 'Handicap', 'FRAN01'),
('ANGL0102', 'Grandes figures littéraires', 'FRAN01'),
('ANGL0103', 'Happy hours', 'FRAN01'),
('ANGL0104', 'Histoire médiévale', 'FRAN01'),
('ANGL0105', 'Intelligence collective', 'FRAN01'),
('ANGL0106', 'Expérience 3.0', 'FRAN01'),
('ANGL0107', 'Chatbot et IA', 'FRAN01'),
('ANGL0108', 'Stories', 'FRAN01'),
('ANGL0109', 'Secret', 'FRAN01'),
('ANGL0110', 'We heart it', 'FRAN01'),
('ANGL0111', 'Yik Yak', 'FRAN01'),
('ANGL0112', 'Shots', 'FRAN01'),
('ANGL0113', 'Tik Tok', 'FRAN01'),
('ANGL0114', 'Recherche vocale', 'FRAN01'),
('ANGL0201', 'Handicap', 'ANGL01'),
('ANGL0202', 'Great literary figures', 'ANGL01'),
('ANGL0203', 'Happy hours', 'ANGL01'),
('ANGL0204', 'Medieval History', 'ANGL01'),
('ANGL0205', 'Collective Intelligence', 'ANGL01'),
('ANGL0206', 'Experience 3.0', 'ANGL01'),
('ANGL0207', 'Chatbot and IA', 'ANGL01'),
('ANGL0208', 'Stories', 'ANGL01'),
('ANGL0209', 'Secret', 'ANGL01'),
('ANGL0210', 'We heart it', 'ANGL01'),
('ANGL0211', 'Yik Yak', 'ANGL01'),
('ANGL0212', 'Shots', 'ANGL01'),
('ANGL0213', 'Tik Tok', 'ANGL01'),
('ANGL0214', 'Voice search', 'ANGL01'),
('ANGL0301', 'Handikap', 'ALLE01'),
('ANGL0302', 'Große literarische Persönlichkeiten', 'ALLE01'),
('ANGL0303', 'Happy hours', 'ALLE01'),
('ANGL0304', 'Mittelalterliche Geschichte', 'ALLE01'),
('ANGL0305', 'Gemeinsame Intelligenz', 'ALLE01'),
('ANGL0306', 'Erfahrung 3.0', 'ALLE01'),
('ANGL0307', 'Chatbot und KI', 'ALLE01'),
('ANGL0308', 'Geschichten', 'ALLE01'),
('ANGL0309', 'Geheimnis', 'ALLE01'),
('ANGL0310', 'Wir lieben es', 'ALLE01'),
('ANGL0311', 'Yik Yak', 'ALLE01'),
('ANGL0312', 'Aufnahmen', 'ALLE01'),
('ANGL0313', 'Tik Tok', 'ALLE01'),
('ANGL0314', 'Sprachsuche', 'ALLE01');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `numArt` int(8) NOT NULL AUTO_INCREMENT,
  `dtCreArt` datetime DEFAULT NULL,
  `libTitrArt` char(100) DEFAULT NULL,
  `libChapoArt` text DEFAULT NULL,
  `libAccrochArt` char(160) DEFAULT NULL,
  `parag1Art` text DEFAULT NULL,
  `libSsTitr1Art` char(100) DEFAULT NULL,
  `parag2Art` text DEFAULT NULL,
  `libSsTitr2Art` char(100) DEFAULT NULL,
  `parag3Art` text DEFAULT NULL,
  `libConclArt` text DEFAULT NULL,
  `urlPhotArt` char(70) DEFAULT NULL,
  `numAngl` char(8) NOT NULL,
  `numThem` char(8) NOT NULL,
  PRIMARY KEY (`numArt`),
  KEY `ARTICLE_FK` (`numArt`),
  KEY `FK_ASSOCIATION_1` (`numAngl`),
  KEY `FK_ASSOCIATION_2` (`numThem`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`numArt`, `dtCreArt`, `libTitrArt`, `libChapoArt`, `libAccrochArt`, `parag1Art`, `libSsTitr1Art`, `parag2Art`, `libSsTitr2Art`, `parag3Art`, `libConclArt`, `urlPhotArt`, `numAngl`, `numThem`) VALUES
(1, '2019-02-24 16:08:30', 'La surprenante reconversion de la base sous-marine', 'Un b&acirc;timent unique charg&eacute; d\'histoire qui a surv&eacute;cu &agrave; l\'emprise des Allemands en 1943, et qui est aujourd\'hui l\'un des symboles d\'art de notre ville bordelaise.', 'La grande immerg&eacute;e du port de la Lune.', 'Oui, notre base sous-marine est notre h&eacute;ritage nazi. En 1943, le bloc de b&eacute;ton, que nous connaissons tous, voit le jour apr&egrave;s 22 mois de travaux forc&eacute;s par des prisonniers.', 'Quel avenir pour cet amas de b&eacute;ton ?', 'Apr&egrave;s la destruction et le sabotage du mat&eacute;riel nazis par les Alli&eacute;s en ao&ucirc;t 1944. Il a fallu se demander que deviendrait ce b&acirc;timent.', 'Peau neuve, color&eacute;e et num&eacute;rique pour la base bordelaise.', 'Aujourd\'hui la base sous marine occupe une place incontournable dans le paysage culturel bordelais.', 'Pour le mot de la fin : Bruno Monnier, pr&eacute;sident de Culturespace, affirme que ses &eacute;quipes et lui ont travaill&eacute; d&rsquo;arrache pied pour imaginer et concevoir la nouvelle base sous marine.', 'imgArt19.jpg', 'ANGL0105', 'THE0101'),
(2, '2019-03-13 20:14:10', 'Le CHU de bordeaux se met-il au bleu ?', 'Le bleu, une couleur si commune, qui provoque tranquillit&eacute;, s&eacute;curit&eacute; et confiance.', 'Le CHU de Bordeaux, est', 'Tout d&rsquo;abord, un logo, que vous avez vu et revu, mais auquel vous n\'avez jamais, vraiment pr&ecirc;t&eacute; attention.', 'Savez-vous pourquoi les blouses des chirurgiens sont-elles bleues ?', 'Voici une question que vous ne vous &ecirc;tes peut-&ecirc;tre jamais pos&eacute;e. Pourquoi les diff&eacute;rents h&ocirc;pitaux, ont-ils choisi, pour leurs op&eacute;rations la couleur bleue, ou m&ecirc;me vert clair ?', 'Connaissez vous les f&eacute;es du CHU de Bordeaux ?', 'Les F&eacute;es Bleues sont une association cr&eacute;&eacute;e par le personnel soignant du CHU, qui a pour but d&rsquo;apporter de la couleur et du confort, dans le monde aseptis&eacute; du soin des pr&eacute;matur&eacute;s ou bien pour les enfants en r&eacute;animation.', 'Et voil&agrave; vous savez maintenant tout sur le CHU de Bordeaux ! Quoi que &hellip; Savez-vous qu&rsquo;il participe &agrave; l\'op&eacute;ration de sensibilisation Mars Bleu ?', 'imgArt18.jpg', 'ANGL0105', 'THE0101'),
(3, '2019-11-09 10:34:20', 'Le Lion bleu de Bordeaux, star des r&eacute;seaux sociaux', 'Surplombant la place Stalingrad, anciennement place du Pont, et faisant fi&egrave;rement face au pont de Pierre, le Lion bleu de Xavier Veilhan fait depuis 2005 l&rsquo;objet de toutes les convoitises.', 'En France, depuis 1951 etqdqsdqsdsqdsqd', 'En construisant les lignes de tramway, la ville de Bordeaux et sa m&eacute;tropole ont donc mis en place le programme', 'Un symbole de la rive droite', 'On n\'imagine pas la place Stalingrad sans cet imposant f&eacute;lin color&eacute;. Ce lion bleu est devenu l\'embl&egrave;me de cette place et, pour les habitants de la rive gauche, c\'est le symbole de', 'Un tremplin pour Xavier Veilhankfezjkfjezkjfkezjkfsjkzejfjezjzefjezkjfkjezkfjzef', 'L\'artiste plasticien &agrave; l\'origine du Lion bleu, dipl&ocirc;m&eacute; de l\'EnsAD-Paris (&Eacute;cole Nationale Sup&eacute;rieure des Arts D&eacute;coratifs) et officier de l\'Ordre des Arts et des Lettres, n\'a pas choisi une figure animali&egrave;re pour rien. La place Stalingrad est un hommage &agrave; la victoire de l\'arm&eacute;e sovi&eacute;tique durant la Seconde Guerre Mondiale.', 'Esp&eacute;rons que cet &eacute;lan de cr&eacute;ativit&eacute; se poursuive et que, par la suite, Xavier Veilhan r&eacute;utilise cette couleur qui nous est si ch&egrave;re, le bleu.', 'imgArtdc45e1ade864e7b582d0a008be601a00.jpg', 'ANGL0105', 'THE0101'),
(4, '2019-02-26 18:08:30', 'The surprising reconversion of the submarine base', 'A unique building steeped in history that survived the Germans\' hold in 1943, and which today is one of the symbols of art in our Bordeaux city.', 'The large submerged harbour of the Moon,', 'Yes, our submarine base is our Nazi heritage. In 1943, the concrete block, which we all know, was built after 22 months of forced labour by prisoners.', 'What does the future hold for this pile of concrete?', 'After the destruction and sabotage of Nazi equipment by the Allies in August 1944, one had to wonder what would become of this building.', 'New, coloured and digital skin for the Bordeaux base.', 'Today the submarine base occupies an essential place in the cultural landscape of Bordeaux.', 'For the last word : Bruno Monnier, President of Culturespace, says he and his teams have worked hard to imagine and design the new submarine base.', 'imgArt658d4c513594caaa32d709e70128a165.jpg', 'ANGL0205', 'THE0201'),
(5, '2019-11-13 20:14:20', 'The Blue Lion of Bordeaux, star of social networks', 'Overlooking Stalingrad Square', 'In France, since 1951 and the', 'With the construction of the tramway lines, the city of Bordeaux and its metropolis have therefore set up the', 'A symbol of the right bank', 'One cannot imagine Stalingrad Square without this imposing colourful feline. This blue lion has become the emblem of this square and, for the inhabitants of the left bank, it is the symbol of', 'A springboard for Xavier Veilhan', 'The visual artist behind the Blue Lion, a graduate of EnsAD-Paris (&Eacute;cole Nationale Sup&eacute;rieure des Arts D&eacute;coratifs) and an officer of the Ordre des Arts et des Lettres, did not choose an animal figure for nothing. Stalingrad square is a tribute to the victory of the Soviet army during the Second World War.', 'imgArt7b77e2c95481c53e836bcaa0212123b9.jpg', 'imgArt64d5aa05545e99aab203ab6a08255b1f.jpg', 'ANGL0205', 'THE0201'),
(26, '2021-02-23 09:44:47', 'ihi', 'ihu', 'hiu', 'hiuh', 'iuh', 'uh', 'uih', 'iuh', 'uh', NULL, 'ANGL0204', 'THE0201'),
(27, '2021-02-23 03:36:40', 'jh', 'jh', 'h', 'jh', 'kj', 'jh', 'j', 'hjhh', 'j', NULL, 'ANGL0301', 'THE0301'),
(28, '2021-02-23 03:38:28', 'jjkjkjKj', 'KJ', 'K', 'J', 'KJ', 'K', 'KAL', 'JJ', 'LM.SXQLXK', '', 'ANGL0313', 'THE0302'),
(29, '2021-02-24 11:17:21', 'hgh', 'ghg', 'hg', 'hgh', 'ghg', 'h', 'gh', 'gh', 'g', 'imgArt046870be089270083f461e5952cb3c90.jpg', 'ANGL0301', 'THE0301'),
(30, '2021-02-24 11:18:28', 'hgh', 'ghg', 'hg', 'hgh', 'ghg', 'h', 'gh', 'gh', 'g', 'imgArt407eb0ae3b64c36c8c8742d875010d6c.jpg', 'ANGL0301', 'THE0301'),
(31, '2021-02-24 11:26:26', 'hgh', 'ghg', 'hg', 'hgh', 'ghg', 'h', 'gh', 'gh', 'g', 'imgArt268de565b3d8833a8f41fee4cf5cbe3e.jpg', 'ANGL0301', 'THE0301'),
(32, '2021-02-24 11:26:46', 'hjhj', 'hjh', 'jh', 'j', 'j', 'lkfl', 'h', 'hjhh', 'hjh', 'imgArt5f77d7a382d03da724b321907e9210ab.jpg', 'ANGL0303', 'THE0301'),
(33, '2021-02-24 01:20:09', 'hghh', 'ghg', 'hg', 'hgh', 'gh', 'ghg', 'hg', 'hgh', 'hg', 'imgArt89744e18450deea103af5b7f0624d2d4.jpg', 'ANGL0303', 'THE0301'),
(34, '2021-02-24 01:20:49', 'hghh', 'ghg', 'hg', 'hgh', 'gh', 'ghg', 'hg', 'hgh', 'hg', 'imgArta214e062e46f0d8d7fbffa32ce2bda4d.jpg', 'ANGL0303', 'THE0301'),
(35, '2021-02-24 01:27:05', 'hghh', 'ghg', 'hg', 'hgh', 'gh', 'ghg', 'hg', 'hgh', 'hg', 'imgArt2af759392fb9e5bcf3ecc31db7f7a900.jpg', 'ANGL0303', 'THE0301'),
(36, '2021-02-24 01:27:42', 'hghh', 'ghg', 'hg', 'hgh', 'gh', 'ghg', 'hg', 'hgh', 'hg', 'imgArt89366a16811cc1a7584722a1731beb0a.jpg', 'ANGL0303', 'THE0301'),
(37, '2021-02-24 01:28:42', 'hghh', 'ghg', 'hg', 'hgh', 'gh', 'ghg', 'hg', 'hgh', 'hg', 'imgArtfea43dd4055ce567f54eaddf433a69ec.jpg', 'ANGL0201', 'THE0201'),
(38, '2021-02-24 01:29:24', 'hghh', 'ghg', 'hg', 'hgh', 'gh', 'ghg', 'hg', 'hgh', 'hg', 'imgArt8b6092f090982dbeaf7e7843bebd2c46.jpg', 'ANGL0201', 'THE0201'),
(39, '2021-02-24 01:29:40', 'hghh', 'ghg', 'hg', 'hgh', 'gh', 'ghg', 'hg', 'hgh', 'hg', 'imgArt9d1b43f3b4213e47e8e42b2a625d4c36.jpg', 'ANGL0201', 'THE0201'),
(40, '2021-02-24 01:29:55', 'hghh', 'ghg', 'hg', 'hgh', 'gh', 'ghg', 'hg', 'hgh', 'hg', 'imgArted69f5a38cd48ef137c01e5f567ce0bb.jpg', 'ANGL0201', 'THE0201'),
(41, '2021-02-24 01:30:10', 'hghh', 'ghg', 'hg', 'hgh', 'gh', 'ghg', 'hg', 'hgh', 'hg', 'imgArt5d4beb5cb1585e59fe3bd586e97d80d0.jpg', 'ANGL0201', 'THE0201'),
(42, '2021-02-24 01:32:13', 'hghh', 'ghg', 'hg', 'hgh', 'gh', 'ghg', 'hg', 'hgh', 'hg', 'imgArtc290d859e047b779dd8185b7c151c6c9.jpg', 'ANGL0201', 'THE0201'),
(43, '2021-02-24 01:33:03', 'ghg', 'gg', 'g', 'hg', 'ghg', 'hgh', 'gh', 'ghg', 'kjckc', 'imgArtab6c41dc9589a3df2a157aea01367e90.jpg', 'ANGL0301', 'THE0301'),
(44, '2021-02-24 01:33:49', 'ghg', 'gg', 'g', 'hg', 'ghg', 'hgh', 'gh', 'ghg', 'kjckc', 'imgArtf983b11e1e93daea0653839196c313b4.jpg', 'ANGL0301', 'THE0301'),
(45, '2021-02-24 01:36:53', 'azer', 'azer', 'azer', 'zeer', 'hbnb', 'nv', 'nbv', 'bv', 'bvb', 'imgArt3f37b903b292777b03e741b3025df5a0.jpg', 'ANGL0307', 'THE0303'),
(46, '2021-02-24 02:16:20', 'jhj', 'jj', 'h', 'h', 'h', 'h', 'jhjh', 'jhjh', 'jh', 'imgArt9c86424a5aedff409603dadef0eede95.jpg', 'ANGL0103', 'THE0103'),
(47, '2021-02-24 02:16:38', 'lk', 'jkjk', 'hjh', 'jh', 'jh', 'hj', 'h', 'h', 'hjh', 'imgArtc6654625819548e1eac9c9beb280533a.jpg', 'ANGL0101', 'THE0104'),
(48, '2021-02-25 09:20:37', 'test', 'aer', 'azer', 'azer', 'azer', 'zzer', 'azer', 'azert', 'azert', 'imgArt83034573548e214fac42feddcff4c9a8.png', 'ANGL0108', 'THE0104'),
(49, '2021-02-25 09:24:07', 'azert', 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', 'imgArtf66dae8f665257da673012ea02c61138.jpg', 'ANGL0201', 'THE0203'),
(50, '2021-02-27 02:01:19', 'LE REGARD DISCRET ET EFFACE DES MASCARONS!', 'Savez vous ce que sont des mascarons ? Avez vous d&eacute;j&agrave; pris le temps d&rsquo;observer plus la ville de Bordeaux, allez plus loin que les apparences, et voir ces figures qui vous fixent dans le coin des b&acirc;timents ? Dans tous les cas, je vous propose d&rsquo;apprendre &agrave; d&eacute;couvrir Bordeaux sous un nouveau jour !', 'Entre burlesque et baroque, voici venir le vrai visage de la Belle Endormie !', 'Avez-vous d&eacute;j&agrave; remarqu&eacute; ces regards silencieux et intimidants qui nous fixent dans les rues bordelaises ? Ce sont des mascarons, vestiges d&rsquo;une ancienne &eacute;poque, masques burlesques pi&eacute;g&eacute;s &agrave; tout jamais dans la pierre font partie int&eacute;grante de l&rsquo;histoire de Bordeaux, mais &eacute;galement de l&rsquo;histoire de la France. Avant d\'arriver &agrave; Bordeaux, ces sculptures et ornements sont cisel&eacute;s pour Fran&ccedil;ois 1er par de nombreux artistes, et, c&rsquo;est ainsi que les mascarons se r&eacute;pandent dans toute la France. Ces figures, nomm&eacute;es &ldquo;mascarons&rdquo;, de l&rsquo;italien &ldquo;grand masque grotesque&rdquo; et de l&rsquo;arabe, &ldquo;bouffonnerie&rdquo;, sont des sculptures et ornements, form&eacute;s d&rsquo;une t&ecirc;te ou d&rsquo;un masque. Leur fonction &eacute;tait de prot&eacute;ger les maisons. Ces masques &eacute;taient mis sur les fa&ccedil;ades des habitations pour repousser les mauvais esprits et ainsi, s&rsquo;attirer les faveurs des dieux ! Ils arrivent donc dans notre ville &agrave; la fin du XVIe si&egrave;cle par le ma&icirc;tre ma&ccedil;on Henri Roche. Puis les mascarons se diffusent dans toute la ville au XVIIIe si&egrave;cle gr&acirc;ce aux grands travaux entrepris par l&rsquo;intendant Tourny (Si vous ne le connaissez pas, cet homme a permis &agrave; Bordeaux de se transformer, la ville lui doit beaucoup). Les mascarons ornent chaque recoin de la ville de Bordeaux, &agrave; tel point qu&rsquo;on la surnomme &ldquo;la ville aux masques&rdquo;.', 'Les Mascarons de Bordeaux, figures du XVIe si&egrave;cle :', 'Reconna&icirc;tre les diff&eacute;rents mascarons de Bordeaux n&rsquo;est pas simple, mais la bonne nouvelle, c&rsquo;est que c&rsquo;est possible de les diff&eacute;rencier ! Et oui, la plupart des mascarons de Bordeaux ont pour inspiration les dieux antiques, que l&rsquo;on peut reconna&icirc;tre gr&acirc;ce aux attributs qui ornent leurs cartouches. Ainsi, il est ais&eacute; de reconna&icirc;tre une repr&eacute;sentation divine. Vous allez impressionner votre famille et vos amis en leur montrant un mascaron et en leur donnant son identit&eacute; ! Par exemple, Minerve est repr&eacute;sent&eacute;e avec une chouette &agrave; ses c&ocirc;t&eacute;s, la foudre pour Jupiter, un trident et/ou un gouvernail pour Neptune. Parfois, vous pourrez voir des t&ecirc;tes animales, cornues pour les satyres, des lions &eacute;dent&eacute;s&hellip; Et aussi des repr&eacute;sentations de femmes noires ! A votre avis, pourquoi des repr&eacute;sentations de femmes noires ? Il faut remonter assez loin dans le temps, &agrave; l&rsquo;&eacute;poque du commerce triangulaire&hellip; &Ccedil;a y est, vous voyez o&ugrave; je veux en venir ? Eh oui, ces repr&eacute;sentations sont des r&eacute;f&eacute;rences &agrave; la traite n&eacute;gri&egrave;re. Les mascarons refl&egrave;tent l&rsquo;histoire de la ville : la colonisation et l&rsquo;esclavage ont beaucoup particip&eacute; &agrave; la richesse de Bordeaux, tant par la traite n&eacute;gri&egrave;re que par le commerce de denr&eacute;es cultiver par les esclaves. Ainsi, de nombreux mascarons Bordelais gardent la m&eacute;moire de cette histoire et repr&eacute;sentent donc des visages africains.', 'Un visage parmi tant d&rsquo;autres :', 'Apr&egrave;s toutes ces informations sur les mascarons, encore faut-il les trouver, savoir o&ugrave; ils sont&hellip;Pas facile de les apercevoir... De balade en balade, j&rsquo;ai rep&eacute;r&eacute; un certain nombre de rues, o&ugrave; les mascarons sont nombreux, &agrave; peine visibles, cach&eacute;s sur les fa&ccedil;ades des maisons, discrets, intimidants, comiques pour certains&hellip; Voici alors quelques parcours pour d&eacute;couvrir Bordeaux d&rsquo;un nouvel &oelig;il ! Des balades &ldquo;Fast&rdquo; d\'&agrave; peine 10 minutes, aux balades de plus de 30 minutes !\r\nBalade Fast (~10 minutes):\r\nAll&eacute;es de Tourny -&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; Rue Mautrec -&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; Rue du pont de la Mousque -&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; Place Gabriel.\r\nTrajet de 9 minutes &agrave; pied, 3 minutes en v&eacute;lo, 700 m&egrave;tres environ !\r\nRue du Mirail -&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; Cours Victor Hugo -&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; Place Pey Berland .\r\nTrajet de 13 minutes &agrave; pied, 5 minutes en v&eacute;lo, 1,1 km environ !\r\n\r\nBalade Simple (~20 minutes):\r\nRue de Pessac -&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; Rue Th&eacute;odore Gard&egrave;re -&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; Rue Leyteire.\r\nTrajet de 23 minutes &agrave; pied, 10 minutes en v&eacute;lo, 2,5 km environ !\r\nRue David Johnston -&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; Rue Camille Godard -&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; Cours de la Martinique.\r\nTrajet de 21 minutes &agrave; pied, 8 minutes en v&eacute;lo, 1,7 km environ !\r\n\r\nBalade Longue (~30 minutes ou plus):\r\nCours de l&rsquo;Yser -&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; Cours Aristide Briand -&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; Rue Malbec -&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; Rue Cadaujac -&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; Cours de la Somme.\r\nTrajet de 33 minutes &agrave; pied, 12 minutes en v&eacute;lo, 2,6 km environ !\r\nCours de la Somme -&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; Rue de Serpolet -&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; Rue des Trois Conils.\r\nTrajet de 30 minutes &agrave; pied, 11 minutes en v&eacute;lo, 2,3 km environ !\r\nRue Lachassaigne -&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; Rue de Mexico -&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; Rue de Capdeville.\r\nTrajet de 39 minutes &agrave; pied, 17 minutes en v&eacute;lo, 3,7 km environ !', 'J&rsquo;esp&egrave;re que je vous aurais &eacute;t&eacute; utile dans vos recherches de l&rsquo;histoire de Bordeaux et vous aurait donn&eacute; envie de visiter la ville sous un nouveau jour, ou plut&ocirc;t, sous un nouveau regard ! N\'oubliez pas de partager les mascarons qui vous auront le plus plu, et o&ugrave; vous les avez trouver ! Et le plus important, n&rsquo;h&eacute;sitez pas &agrave; vous &eacute;carter des sentiers battus pour d&eacute;couvrir d&rsquo;autres visages peu connus ! Il y en a environ 3000, rien qu&rsquo;&agrave; Bordeaux ! Arriverez-vous &agrave; tous les trouver ?', 'imgArtb668ac7458867e4d0a90289c0f52530b.png', 'ANGL0107', 'THE0101'),
(51, '2021-02-27 02:12:30', 'La face cach&eacute;e des bassins de lumi&egrave;res', 'Les Bassins de Lumi&egrave;res, nich&eacute; dans la base sous-marine de Bordeaux, &agrave; ouvert ses portes au public en 2020, en tant que plus grand centre d&rsquo;art num&eacute;rique au monde, avec ces 14 000 m2 d&rsquo;exposition, cet espace culturel est une mine d&rsquo;or pour les f&eacute;rus d&rsquo;art et de modernit&eacute;. Pourtant la base sous-marine renferme un pass&eacute; sombre o&ugrave; se m&eacute;langent horreur et secret. L&rsquo;art att&eacute;nuera -t-il la noirceur des souvenirs anciens ?', 'Entre &eacute;merveillement et ignominie, quand art et histoire se m&ecirc;lent, d&eacute;couvrez la face cach&eacute;e des Bassins de Lumi&egrave;res.', 'Aujourd&rsquo;hui l&rsquo;une des derni&egrave;res traces de la Seconde Guerre mondiale &agrave; Bordeaux, ce bloc de b&eacute;ton repr&eacute;sente un &eacute;difice convoit&eacute; par les artistes. Apr&egrave;s avoir abrit&eacute; de petites entreprises en 1960, puis des expositions temporaires en 1990, on y trouve aujourd&rsquo;hui de somptueuses expositions immersives. Les gigantesques alv&eacute;oles,de b&eacute;ton, d&rsquo;acier et d\'eau, o&ugrave; se d&eacute;roulent les expositions, offrent au spectateurs un spectacle en 360.&deg; Les tableaux se refl&eacute;tant dans l&rsquo;eau accentuent le ressenti f&eacute;erique, mystique presque irr&eacute;el de la sc&egrave;ne. Sur la totalit&eacute; de l\'&eacute;difice 14 000 m2 sont ouverts au public. Les salles, toutes uniques, offrent chacune un point de vue diff&eacute;rent sur l&rsquo;art qu&rsquo;elles projettent. L&rsquo;espace et le lieu laissent place &agrave; une multitude de possibilit&eacute;s de projection. Les spectateurs ont pu admirer les &oelig;uvres de Gustav Klimt &agrave; partir du 10 juin 2020, accompagn&eacute; musicalement par Luca Longobardi. Malheureusement, l&rsquo;exposition &agrave; &eacute;t&eacute; &eacute;court&eacute;e &agrave; cause de l\'&eacute;pid&eacute;mie actuelle. C&rsquo;est avec impatience que nous attendons la r&eacute;ouverture pour pouvoir admirer les projections bleut&eacute;es de Yves Klein et une exposition sur le th&egrave;me de la M&eacute;diterran&eacute;e, avec diff&eacute;rents artistes comme Monet, Picasso, Renoir&hellip; Avec tout &ccedil;a nous sommes d&rsquo;accord que Culturespaces, qui a orchestr&eacute; la remise &agrave; neuf de la base sous-marine de Bordeaux, nous offre un un espace culturel incroyable et moderne. Seulement, est-ce suffisant pour oublier le pass&eacute; sinistre de ce lieu ? Les &oelig;uvres projet&eacute;es sur les murs parviennent-elles &agrave; effacer les actes inhumains qui se sont d&eacute;roul&eacute;s &agrave; l\'int&eacute;rieur de ceux-ci ?', 'Les Bassins de Lumi&egrave;res, le renouveau de la base sous marine', 'La construction de la base sous-marine de Bordeaux commence en 1941. Cet &eacute;difice de 45 000 m2 et de 600 000 m3 de b&eacute;ton arm&eacute; fut un point strat&eacute;gique pour les allemands durant la Seconde Guerre mondiale. Construite sous les ordres allemands, cette base est l&rsquo;une des 5 construites sur le littoral fran&ccedil;ais. La main-d\'&oelig;uvre &eacute;tait constitu&eacute;e essentiellement de r&eacute;publicains espagnols ayant &eacute;t&eacute; forc&eacute;s d&rsquo;exil par le r&eacute;gime Franco, r&eacute;fugi&eacute;s en France pour trouver un peu de paix et de justice. Mais le pays est &agrave; l&rsquo;aube de la Seconde Guerre mondiale et n&rsquo;offre qu&rsquo;une atmosph&egrave;re pesante et hostile. En d&eacute;pit des attentes des exil&eacute;s, 275 000 r&eacute;publicains espagnols sont intern&eacute;s dans des camps de concentration en 1939,c&rsquo;est la Retirada. En 1941, alors que le chantier de la base navale de Bordeaux bat son plein et a grandement besoin de main d\'&oelig;uvre, le r&eacute;gime de Vichy, ne voulant pas exposer les fran&ccedil;ais, livre les r&eacute;publicains espagnols, les &ldquo;ind&eacute;sirables&rdquo;, aux forces allemandes. Les conditions de travail sont insoutenables. Menac&eacute;s par des attaques, des bombardements et des tirs ennemis, ils travaillaient 11h par jour sous la stricte surveillance des SS, avant d\'&ecirc;tre renvoy&eacute;s dans la caserne Niels, aujourd&rsquo;hui d&eacute;nomm&eacute;e l&rsquo;espace Darwin, sur la rive droite de Bordeaux, o&ugrave; ils &eacute;taient d&eacute;tenus. Les ouvriers coulaient du b&eacute;ton 24h sur 24. Durant ce chantier, plus de 70 r&eacute;publicains espagnols sont d&eacute;c&eacute;d&eacute;s, certains auraient &eacute;t&eacute; emmur&eacute;s dans l&rsquo;&eacute;difice.', 'Un pass&eacute; coul&eacute; dans le b&eacute;ton', 'En hommage aux hommes disparus durant cette construction, un M&eacute;morial a &eacute;t&eacute; inaugur&eacute; devant la base le 14 avril 2012. En 2015, Manuel Valls a reconnu coupable la France d&rsquo;avoir d&eacute;port&eacute; les Espagnols dans des camps de concentration en 1939. Avant &ccedil;a, la Retirada n&rsquo;avait jamais &eacute;t&eacute; assum&eacute;e par la France. Mais la prise de parole du premier ministre n&rsquo;avait &eacute;t&eacute; publi&eacute;e dans aucune autre presse. D&rsquo;autre part, &agrave; l\'int&eacute;rieur des bassins de lumi&egrave;res, dans l&rsquo;exposition permanente, seule une demi phrase est adress&eacute;e aux r&eacute;publicains espagnols. Est-ce donc suffisant ? Ces hommes, suite &agrave; la d&eacute;faite d&rsquo;une guerre, se retrouvent dans un pays inconnu, enferm&eacute;s dans des camps, puis, aux profit des fran&ccedil;ais, livr&eacute;s aux forces ennemies et ensuite contraints aux travaux forc&eacute;s. Certains se sont par la suite li&eacute;s &agrave; la R&eacute;sistance, et se sont battus aux m&ecirc;mes titres que des milliers de fran&ccedil;ais contre le r&eacute;gime nazis. Malgr&eacute; &ccedil;a, l&rsquo;histoire de ces oubli&eacute;s aux destins tragiques reste enfouie dans l&rsquo;ombre. A ce jour, les descendants de ces exil&eacute;s espagnols cherchent encore &agrave; retracer l&rsquo;histoire de leurs anc&ecirc;tres r&eacute;publicains dont l&rsquo;ombre plane encore sur certains aspects.', 'Dans une Histoire o&ugrave; la France est loin d&rsquo;&ecirc;tre immacul&eacute;e, les Bassins de Lumi&egrave;res semblent repr&eacute;senter la r&eacute;demption de ce lieu. Recouvrir ses murs, teint&eacute; du destin tragique de ces hommes, par une multitude de couleurs et de formes. Loin de l&agrave; l&rsquo;intention de d&eacute;valoriser ce travail faramineux qui &agrave; permis &agrave; cet endroit de devenir une toile g&eacute;ante, &eacute;merveillant les publics de tout &acirc;ge. La structure des Bassins de Lumi&egrave;res a offert de nouvelles possibilit&eacute;s en termes d&rsquo;interpr&eacute;tation des &oelig;uvres classiques. Mais les peintures se refl&eacute;tant dans l&rsquo;eau ne suffisent pas &agrave; faire oublier le sang qui y a coul&eacute;, ces gens qui y ont laiss&eacute; la vie, et dont la destin&eacute;e est encore trop peu repr&eacute;sent&eacute;e. Faudra - t -il attendre longtemps pour que la France assume l&rsquo;enti&egrave;ret&eacute; de son pass&eacute;, ou les actes resteront enfouis dans les m&eacute;moires de certains ?', 'imgArt2c6532515214fb71bf13036cc26fcc06.jpg', 'ANGL0106', 'THE0101'),
(52, '2021-02-27 03:09:48', 'STREET ART: L\'ART ILLEGAL', 'Il fait partie int&eacute;grante de chaque ville et pourtant il reste malgr&eacute; tout ill&eacute;gal. Cet art g&eacute;n&egrave;re cependant une grande fascination chez de nombreux artistes et n&rsquo;est pas pr&ecirc;t de s&rsquo;&eacute;teindre ! D&eacute;couvrez ce qu&rsquo;il en est &agrave; Bordeaux et ses artistes phare tels que Alber ou encore Micha&euml;l Husser, un street artiste venu habiller les murs de la belle endormie.', '&Ecirc;tes-vous pr&ecirc;ts &agrave; d&eacute;couvrir cette face cach&eacute;e de Bordeaux ?', 'Le street art ( art urbain en fran&ccedil;ais ), d&eacute;finit toutes les fresques et les peintures que l&rsquo;on aper&ccedil;oit aux quatre coins des murs de nos villes. Ils sont g&eacute;n&eacute;ralement r&eacute;alis&eacute;s &agrave; partir de peintures a&eacute;rosol. Mais il regroupe diff&eacute;rentes autres techniques comme la mosa&iuml;que, le pochoir ou encore les stickers.\r\nL&rsquo;histoire de cette pratique commence &agrave; New York dans les ann&eacute;es 40. O&ugrave; un ouvrier dans une usine de peinture a&eacute;rosol s&rsquo;est amus&eacute; &agrave; signer sur un mur de cette m&ecirc;me usine : &ldquo;Kilroy was here&rdquo;. Vous connaissiez s&ucirc;rement cette phrase sans conna&icirc;tre son origine ! Aujourd&rsquo;hui, on la retrouve dans tout le globe, on peut m&ecirc;me l&rsquo;apercevoir dans le jeu vid&eacute;o Life is strange. Par ailleurs, en France nous verrons le street art se r&eacute;pandre qu&rsquo;&agrave; partir des ann&eacute;es 70. Malgr&eacute; l&rsquo;engouement que suscite cet art, le street art demeure ill&eacute;gal, il est passible d&rsquo;amende allant de 3 750 &euro; jusqu&rsquo;&agrave; 30 000 &euro;, mais aussi de travaux g&eacute;n&eacute;raux et m&ecirc;me d&rsquo;emprisonnement. De quoi passer l&rsquo;envie de s&rsquo;essayer au street art sans autorisation. Mais ce n&rsquo;est pas ce qui effraie nos street artist, pour le plus grand bien de nos pupilles !', 'Reprenons les bases :', 'Tous ces interdits n&rsquo;ont pas emp&ecirc;ch&eacute; Alber, un artiste graffeur bordelais de commencer les graffiti &agrave; l&rsquo;&acirc;ge de 15 ans seulement. Qui depuis 2010 remplies les b&acirc;timents bordelais de ces gigantesques &oelig;uvres remplies de couleurs. Si vous &ecirc;tes un habitu&eacute; de Bordeaux, ses &oelig;uvres ne vous ont s&ucirc;rement pas &eacute;chapp&eacute;. Alber oriente son travail autour du visage, parmi toutes ces faces la seule que l\'on ne voit jamais, c&rsquo;est la sienne. Il pr&eacute;f&egrave;re donner plus de visibilit&eacute; &agrave; ses visages peints, compos&eacute;s de formes g&eacute;om&eacute;triques aux couleurs vives. Toujours impressionnantes, avec leurs regards aussi per&ccedil;ants et &eacute;motifs les uns que les autres, leurs formes tout en courbes et en douceur, tant&ocirc;t des femmes tant&ocirc;t des hommes mais toujours aux aplats de couleurs bariol&eacute;s et excentriques. Son art, compar&eacute; &agrave; d\'autres artistes n&rsquo;a rien de politique, son seul but, colorer les murs ternes de Bordeaux ! Ses visages se retrouvent un peu partout dans Bordeaux et m&ecirc;me en int&eacute;rieur, il n&rsquo;est donc pas difficile de croiser leur regard. Mais si vous n&rsquo;avez jamais eu la chance de rencontrer l&rsquo;une de ces fresques ou si vous voulez en d&eacute;couvrir d&rsquo;avantage, voici plusieurs spots o&ugrave; vous pouvez les trouver et les admirer : Du quai Darwin aux Bassins &agrave; flots mais aussi sur les devantures de commerces aux quartiers Saint-Pierre et Saint-Michel. Amateur d&rsquo;art ou simplement promeneur curieux, levez les yeux en esp&eacute;rant croiser la route d&rsquo;une de ces &oelig;uvres &eacute;ph&eacute;m&egrave;res, et oui, les non adeptes de street art n&rsquo;ont aucuns remords &agrave; effacer ces &oelig;uvres qualifi&eacute; de vandalisme !', 'Alber, l&rsquo;artiste au milles visages :', 'Malgr&eacute; la loi, le street art est une pratique artistique &agrave; part enti&egrave;re, il y a autant de styles que d&rsquo;artistes. Et &agrave; Bordeaux, cet art ne manque pas d&rsquo;adeptes, tel que Micha&euml;l Husser alias Mika dont les &oelig;uvres surr&eacute;alistes se retrouvent en devantures de magasin dans le centre de la ville, mais aussi dans les coins plus recul&eacute;s et tranquilles. Laissons de c&ocirc;t&eacute; les couleurs vives des visages d&rsquo;Alberts pour nous int&eacute;resser aux personnages attendrissants de Mika. Chacunes de ces &oelig;uvres semblent v&eacute;hiculer une &eacute;motion diff&eacute;rente, un enfants aux masque de chat et au cheveux fleurit ou bien des femmes masqu&eacute;es orn&eacute;s de feuilles de vignes, laissez vous emporter dans le monde unique de cet artiste. Son talent n&rsquo;a d\'ailleurs pas laiss&eacute; les entreprises indiff&eacute;rentes puisqu\'il a, &agrave; plusieurs reprises, travaill&eacute; pour Decathlon dans le design de skateboard, de snowboard ou encore de doudoune. Mais &eacute;galement pour Citro&euml;n lui a fait confiance pour graffer la voiture &ldquo;DS3 Cabrio&rdquo; &agrave; l&rsquo;occasion d&rsquo;un shooting photo. A Bordeaux, c&rsquo;est &agrave; la Chartreuse Bel Sito que vous trouverez le plus grand condens&eacute; de ses &oelig;uvres. De tr&egrave;s larges fresques surr&eacute;alistes remplies d\'&eacute;motions. Ses &oelig;uvres po&eacute;tiques s&rsquo;&eacute;tendent jusqu&rsquo;au chantier d&eacute;saffect&eacute; qui se trouve &agrave; une centaine de m&egrave;tres.', 'Tous ces b&acirc;timents qui ne servent plus et que tout le monde oublie sont un v&eacute;ritable tr&eacute;sor d&rsquo;expression artistique. Cet art reste malgr&eacute; tout ill&eacute;gal et pr&eacute;sente un fort risque de p&eacute;nalisation. Il est parfois utilis&eacute; pour v&eacute;hiculer certains messages de propagandes ou de propos tr&egrave;s d&eacute;plac&eacute;s, mais souvenez-vous qu&rsquo;ils n&rsquo;ont rien en commun avec ces grandes &oelig;uvres qui redonnent des couleurs l&agrave; o&ugrave; il n&rsquo;y en a plus et ravive l&rsquo;&acirc;me d&eacute;chue de ces lieux pourtant extraordinaires. N&rsquo;attendez plus, partez &agrave; la rencontre des visages color&eacute;s d&rsquo;Albert ou bien des personnages po&eacute;tiques de Mika, peut &ecirc;tre tomberez vous nez &agrave; nez avec une oeuvres nouveau n&eacute;e.', 'imgArta547a5ed37460976a6e37c412d0013c0.png', 'ANGL0106', 'THE0101'),
(53, '2021-02-27 05:59:30', 'iuiuu', 'lkjkj', 'uiuiuiui', 'ouiuuuiu', 'oiioo', 'uiui', 'iuiiuiii', 'iuiuiuiu', 'iuiuui', 'imgArt7637e7992262724cc8541523214dcbca.png', 'ANGL0302', 'THE0301'),
(54, '2021-03-02 07:07:40', 'iuiyu', 'iyyiuyyiuyiu', 'yuiyuiyiuyiuy', 'iyiuyuyiu', 'iuyiuyiuyiuy', 'iououoiuiuoi', 'iuoiuoiuuiu', 'uiouoiuoiu', 'iiouiouuouo', 'imgArtbf91b6df2978f5bf8e40844aa50e573f.png', 'ANGL0301', 'THE0301'),
(55, '2021-03-02 08:05:48', 'STREET ART: L\'ART ILLEGAL', 'Il fait partie int&eacute;grante de chaque ville et pourtant il reste malgr&eacute; tout ill&eacute;gal. Cet art g&eacute;n&egrave;re cependant une grande fascination chez de nombreux artistes et n&rsquo;est pas pr&ecirc;t de s&rsquo;&eacute;teindre ! D&eacute;couvrez ce qu&rsquo;il en est &agrave; Bordeaux et ses artistes phare tels que Alber ou encore Micha&euml;l Husser, un street artiste venu habiller les murs de la belle endormie.', '&Ecirc;tes-vous pr&ecirc;ts &agrave; d&eacute;couvrir cette face cach&eacute;e de Bordeaux ?', 'Le street art ( art urbain en fran&ccedil;ais ), d&eacute;finit toutes les fresques et les peintures que l&rsquo;on aper&ccedil;oit aux quatre coins des murs de nos villes. Ils sont g&eacute;n&eacute;ralement r&eacute;alis&eacute;s &agrave; partir de peintures a&eacute;rosol. Mais il regroupe diff&eacute;rentes autres techniques comme la mosa&iuml;que, le pochoir ou encore les stickers. L&rsquo;histoire de cette pratique commence &agrave; New York dans les ann&eacute;es 40. O&ugrave; un ouvrier dans une usine de peinture a&eacute;rosol s&rsquo;est amus&eacute; &agrave; signer sur un mur de cette m&ecirc;me usine : &ldquo;Kilroy was here&rdquo;. Vous connaissiez s&ucirc;rement cette phrase sans conna&icirc;tre son origine ! Aujourd&rsquo;hui, on la retrouve dans tout le globe, on peut m&ecirc;me l&rsquo;apercevoir dans le jeu vid&eacute;o Life is strange. Par ailleurs, en France nous verrons le street art se r&eacute;pandre qu&rsquo;&agrave; partir des ann&eacute;es 70. Malgr&eacute; l&rsquo;engouement que suscite cet art, le street art demeure ill&eacute;gal, il est passible d&rsquo;amende allant de 3 750 &euro; jusqu&rsquo;&agrave; 30 000 &euro;, mais aussi de travaux g&eacute;n&eacute;raux et m&ecirc;me d&rsquo;emprisonnement. De quoi passer l&rsquo;envie de s&rsquo;essayer au street art sans autorisation. Mais ce n&rsquo;est pas ce qui effraie nos street artist, pour le plus grand bien de nos pupilles !', 'Reprenons les bases :', 'Tous ces interdits n&rsquo;ont pas emp&ecirc;ch&eacute; Alber, un artiste graffeur bordelais de commencer les graffiti &agrave; l&rsquo;&acirc;ge de 15 ans seulement. Qui depuis 2010 remplies les b&acirc;timents bordelais de ces gigantesques &oelig;uvres remplies de couleurs. Si vous &ecirc;tes un habitu&eacute; de Bordeaux, ses &oelig;uvres ne vous ont s&ucirc;rement pas &eacute;chapp&eacute;. Alber oriente son travail autour du visage, parmi toutes ces faces la seule que l\'on ne voit jamais, c&rsquo;est la sienne. Il pr&eacute;f&egrave;re donner plus de visibilit&eacute; &agrave; ses visages peints, compos&eacute;s de formes g&eacute;om&eacute;triques aux couleurs vives. Toujours impressionnantes, avec leurs regards aussi per&ccedil;ants et &eacute;motifs les uns que les autres, leurs formes tout en courbes et en douceur, tant&ocirc;t des femmes tant&ocirc;t des hommes mais toujours aux aplats de couleurs bariol&eacute;s et excentriques. Son art, compar&eacute; &agrave; d\'autres artistes n&rsquo;a rien de politique, son seul but, colorer les murs ternes de Bordeaux ! Ses visages se retrouvent un peu partout dans Bordeaux et m&ecirc;me en int&eacute;rieur, il n&rsquo;est donc pas difficile de croiser leur regard. Mais si vous n&rsquo;avez jamais eu la chance de rencontrer l&rsquo;une de ces fresques ou si vous voulez en d&eacute;couvrir d&rsquo;avantage, voici plusieurs spots o&ugrave; vous pouvez les trouver et les admirer : Du quai Darwin aux Bassins &agrave; flots mais aussi sur les devantures de commerces aux quartiers Saint-Pierre et Saint-Michel. Amateur d&rsquo;art ou simplement promeneur curieux, levez les yeux en esp&eacute;rant croiser la route d&rsquo;une de ces &oelig;uvres &eacute;ph&eacute;m&egrave;res, et oui, les non adeptes de street art n&rsquo;ont aucuns remords &agrave; effacer ces &oelig;uvres qualifi&eacute; de vandalisme !', 'Alber, l&rsquo;artiste au milles visages :', 'Malgr&eacute; la loi, le street art est une pratique artistique &agrave; part enti&egrave;re, il y a autant de styles que d&rsquo;artistes. Et &agrave; Bordeaux, cet art ne manque pas d&rsquo;adeptes, tel que Micha&euml;l Husser alias Mika dont les &oelig;uvres surr&eacute;alistes se retrouvent en devantures de magasin dans le centre de la ville, mais aussi dans les coins plus recul&eacute;s et tranquilles. Laissons de c&ocirc;t&eacute; les couleurs vives des visages d&rsquo;Alberts pour nous int&eacute;resser aux personnages attendrissants de Mika. Chacunes de ces &oelig;uvres semblent v&eacute;hiculer une &eacute;motion diff&eacute;rente, un enfants aux masque de chat et au cheveux fleurit ou bien des femmes masqu&eacute;es orn&eacute;s de feuilles de vignes, laissez vous emporter dans le monde unique de cet artiste. Son talent n&rsquo;a d\'ailleurs pas laiss&eacute; les entreprises indiff&eacute;rentes puisqu\'il a, &agrave; plusieurs reprises, travaill&eacute; pour Decathlon dans le design de skateboard, de snowboard ou encore de doudoune. Mais &eacute;galement pour Citro&euml;n lui a fait confiance pour graffer la voiture &ldquo;DS3 Cabrio&rdquo; &agrave; l&rsquo;occasion d&rsquo;un shooting photo. A Bordeaux, c&rsquo;est &agrave; la Chartreuse Bel Sito que vous trouverez le plus grand condens&eacute; de ses &oelig;uvres. De tr&egrave;s larges fresques surr&eacute;alistes remplies d\'&eacute;motions. Ses &oelig;uvres po&eacute;tiques s&rsquo;&eacute;tendent jusqu&rsquo;au chantier d&eacute;saffect&eacute; qui se trouve &agrave; une centaine de m&egrave;tres.', 'Tous ces b&acirc;timents qui ne servent plus et que tout le monde oublie sont un v&eacute;ritable tr&eacute;sor d&rsquo;expression artistique. Cet art reste malgr&eacute; tout ill&eacute;gal et pr&eacute;sente un fort risque de p&eacute;nalisation. Il est parfois utilis&eacute; pour v&eacute;hiculer certains messages de propagandes ou de propos tr&egrave;s d&eacute;plac&eacute;s, mais souvenez-vous qu&rsquo;ils n&rsquo;ont rien en commun avec ces grandes &oelig;uvres qui redonnent des couleurs l&agrave; o&ugrave; il n&rsquo;y en a plus et ravive l&rsquo;&acirc;me d&eacute;chue de ces lieux pourtant extraordinaires. N&rsquo;attendez plus, partez &agrave; la rencontre des visages color&eacute;s d&rsquo;Albert ou bien des personnages po&eacute;tiques de Mika, peut &ecirc;tre tomberez vous nez &agrave; nez avec une oeuvres nouveau n&eacute;e.', 'banniere_Alber.png', 'ANGL0109', 'THE0103'),
(56, '2021-03-02 08:09:28', 'La face cach&eacute;e des bassins de lumi&egrave;res', 'Les Bassins de Lumi&egrave;res, nich&eacute; dans la base sous-marine de Bordeaux, &agrave; ouvert ses portes au public en 2020, en tant que plus grand centre d&rsquo;art num&eacute;rique au monde, avec ces 14 000 m2 d&rsquo;exposition, cet espace culturel est une mine d&rsquo;or pour les f&eacute;rus d&rsquo;art et de modernit&eacute;. Pourtant la base sous-marine renferme un pass&eacute; sombre o&ugrave; se m&eacute;langent horreur et secret. L&rsquo;art att&eacute;nuera -t-il la noirceur des souvenirs anciens ?', 'Entre &eacute;merveillement et ignominie, quand art et histoire se m&ecirc;lent, d&eacute;couvrez la face cach&eacute;e des Bassins de Lumi&egrave;res.', 'Aujourd&rsquo;hui l&rsquo;une des derni&egrave;res traces de la Seconde Guerre mondiale &agrave; Bordeaux, ce bloc de b&eacute;ton repr&eacute;sente un &eacute;difice convoit&eacute; par les artistes. Apr&egrave;s avoir abrit&eacute; de petites entreprises en 1960, puis des expositions temporaires en 1990, on y trouve aujourd&rsquo;hui de somptueuses expositions immersives. Les gigantesques alv&eacute;oles,de b&eacute;ton, d&rsquo;acier et d\'eau, o&ugrave; se d&eacute;roulent les expositions, offrent au spectateurs un spectacle en 360.&deg; Les tableaux se refl&eacute;tant dans l&rsquo;eau accentuent le ressenti f&eacute;erique, mystique presque irr&eacute;el de la sc&egrave;ne. Sur la totalit&eacute; de l\'&eacute;difice 14 000 m2 sont ouverts au public. Les salles, toutes uniques, offrent chacune un point de vue diff&eacute;rent sur l&rsquo;art qu&rsquo;elles projettent. L&rsquo;espace et le lieu laissent place &agrave; une multitude de possibilit&eacute;s de projection. Les spectateurs ont pu admirer les &oelig;uvres de Gustav Klimt &agrave; partir du 10 juin 2020, accompagn&eacute; musicalement par Luca Longobardi. Malheureusement, l&rsquo;exposition &agrave; &eacute;t&eacute; &eacute;court&eacute;e &agrave; cause de l\'&eacute;pid&eacute;mie actuelle. C&rsquo;est avec impatience que nous attendons la r&eacute;ouverture pour pouvoir admirer les projections bleut&eacute;es de Yves Klein et une exposition sur le th&egrave;me de la M&eacute;diterran&eacute;e, avec diff&eacute;rents artistes comme Monet, Picasso, Renoir&hellip; Avec tout &ccedil;a nous sommes d&rsquo;accord que Culturespaces, qui a orchestr&eacute; la remise &agrave; neuf de la base sous-marine de Bordeaux, nous offre un un espace culturel incroyable et moderne. Seulement, est-ce suffisant pour oublier le pass&eacute; sinistre de ce lieu ? Les &oelig;uvres projet&eacute;es sur les murs parviennent-elles &agrave; effacer les actes inhumains qui se sont d&eacute;roul&eacute;s &agrave; l\'int&eacute;rieur de ceux-ci ?', 'Les Bassins de Lumi&egrave;res, le renouveau de la base sous marine', 'La construction de la base sous-marine de Bordeaux commence en 1941. Cet &eacute;difice de 45 000 m2 et de 600 000 m3 de b&eacute;ton arm&eacute; fut un point strat&eacute;gique pour les allemands durant la Seconde Guerre mondiale. Construite sous les ordres allemands, cette base est l&rsquo;une des 5 construites sur le littoral fran&ccedil;ais. La main-d\'&oelig;uvre &eacute;tait constitu&eacute;e essentiellement de r&eacute;publicains espagnols ayant &eacute;t&eacute; forc&eacute;s d&rsquo;exil par le r&eacute;gime Franco, r&eacute;fugi&eacute;s en France pour trouver un peu de paix et de justice. Mais le pays est &agrave; l&rsquo;aube de la Seconde Guerre mondiale et n&rsquo;offre qu&rsquo;une atmosph&egrave;re pesante et hostile. En d&eacute;pit des attentes des exil&eacute;s, 275 000 r&eacute;publicains espagnols sont intern&eacute;s dans des camps de concentration en 1939,c&rsquo;est la Retirada. En 1941, alors que le chantier de la base navale de Bordeaux bat son plein et a grandement besoin de main d\'&oelig;uvre, le r&eacute;gime de Vichy, ne voulant pas exposer les fran&ccedil;ais, livre les r&eacute;publicains espagnols, les &ldquo;ind&eacute;sirables&rdquo;, aux forces allemandes. Les conditions de travail sont insoutenables. Menac&eacute;s par des attaques, des bombardements et des tirs ennemis, ils travaillaient 11h par jour sous la stricte surveillance des SS, avant d\'&ecirc;tre renvoy&eacute;s dans la caserne Niels, aujourd&rsquo;hui d&eacute;nomm&eacute;e l&rsquo;espace Darwin, sur la rive droite de Bordeaux, o&ugrave; ils &eacute;taient d&eacute;tenus. Les ouvriers coulaient du b&eacute;ton 24h sur 24. Durant ce chantier, plus de 70 r&eacute;publicains espagnols sont d&eacute;c&eacute;d&eacute;s, certains auraient &eacute;t&eacute; emmur&eacute;s dans l&rsquo;&eacute;difice.', 'Un pass&eacute; coul&eacute; dans le b&eacute;ton', 'En hommage aux hommes disparus durant cette construction, un M&eacute;morial a &eacute;t&eacute; inaugur&eacute; devant la base le 14 avril 2012. En 2015, Manuel Valls a reconnu coupable la France d&rsquo;avoir d&eacute;port&eacute; les Espagnols dans des camps de concentration en 1939. Avant &ccedil;a, la Retirada n&rsquo;avait jamais &eacute;t&eacute; assum&eacute;e par la France. Mais la prise de parole du premier ministre n&rsquo;avait &eacute;t&eacute; publi&eacute;e dans aucune autre presse. D&rsquo;autre part, &agrave; l\'int&eacute;rieur des bassins de lumi&egrave;res, dans l&rsquo;exposition permanente, seule une demi phrase est adress&eacute;e aux r&eacute;publicains espagnols. Est-ce donc suffisant ? Ces hommes, suite &agrave; la d&eacute;faite d&rsquo;une guerre, se retrouvent dans un pays inconnu, enferm&eacute;s dans des camps, puis, aux profit des fran&ccedil;ais, livr&eacute;s aux forces ennemies et ensuite contraints aux travaux forc&eacute;s. Certains se sont par la suite li&eacute;s &agrave; la R&eacute;sistance, et se sont battus aux m&ecirc;mes titres que des milliers de fran&ccedil;ais contre le r&eacute;gime nazis. Malgr&eacute; &ccedil;a, l&rsquo;histoire de ces oubli&eacute;s aux destins tragiques reste enfouie dans l&rsquo;ombre. A ce jour, les descendants de ces exil&eacute;s espagnols cherchent encore &agrave; retracer l&rsquo;histoire de leurs anc&ecirc;tres r&eacute;publicains dont l&rsquo;ombre plane encore sur certains aspects.', 'Dans une Histoire o&ugrave; la France est loin d&rsquo;&ecirc;tre immacul&eacute;e, les Bassins de Lumi&egrave;res semblent repr&eacute;senter la r&eacute;demption de ce lieu. Recouvrir ses murs, teint&eacute; du destin tragique de ces hommes, par une multitude de couleurs et de formes. Loin de l&agrave; l&rsquo;intention de d&eacute;valoriser ce travail faramineux qui &agrave; permis &agrave; cet endroit de devenir une toile g&eacute;ante, &eacute;merveillant les publics de tout &acirc;ge. La structure des Bassins de Lumi&egrave;res a offert de nouvelles possibilit&eacute;s en termes d&rsquo;interpr&eacute;tation des &oelig;uvres classiques. Mais les peintures se refl&eacute;tant dans l&rsquo;eau ne suffisent pas &agrave; faire oublier le sang qui y a coul&eacute;, ces gens qui y ont laiss&eacute; la vie, et dont la destin&eacute;e est encore trop peu repr&eacute;sent&eacute;e. Faudra - t -il attendre longtemps pour que la France assume l&rsquo;enti&egrave;ret&eacute; de son pass&eacute;, ou les actes resteront enfouis dans les m&eacute;moires de certains ?', 'imgArt03b727fbb8ed3afc1bba3b56e91e7f64.jpg', 'ANGL0109', 'THE0101');
INSERT INTO `article` (`numArt`, `dtCreArt`, `libTitrArt`, `libChapoArt`, `libAccrochArt`, `parag1Art`, `libSsTitr1Art`, `parag2Art`, `libSsTitr2Art`, `parag3Art`, `libConclArt`, `urlPhotArt`, `numAngl`, `numThem`) VALUES
(57, '2021-03-02 08:13:31', 'LE REGARD DISCRET ET EFFACE DES MASCARONS!', 'Savez vous ce que sont des mascarons ? Avez vous d&eacute;j&agrave; pris le temps d&rsquo;observer plus la ville de Bordeaux, allez plus loin que les apparences, et voir ces figures qui vous fixent dans le coin des b&acirc;timents ? Dans tous les cas, je vous propose d&rsquo;apprendre &agrave; d&eacute;couvrir Bordeaux sous un nouveau jour !', 'Entre burlesque et baroque, voici venir le vrai visage de la Belle Endormie !', 'Avez-vous d&eacute;j&agrave; remarqu&eacute; ces regards silencieux et intimidants qui nous fixent dans les rues bordelaises ? Ce sont des mascarons, vestiges d&rsquo;une ancienne &eacute;poque, masques burlesques pi&eacute;g&eacute;s &agrave; tout jamais dans la pierre font partie int&eacute;grante de l&rsquo;histoire de Bordeaux, mais &eacute;galement de l&rsquo;histoire de la France. Avant d\'arriver &agrave; Bordeaux, ces sculptures et ornements sont cisel&eacute;s pour Fran&ccedil;ois 1er par de nombreux artistes, et, c&rsquo;est ainsi que les mascarons se r&eacute;pandent dans toute la France. Ces figures, nomm&eacute;es &ldquo;mascarons&rdquo;, de l&rsquo;italien &ldquo;grand masque grotesque&rdquo; et de l&rsquo;arabe, &ldquo;bouffonnerie&rdquo;, sont des sculptures et ornements, form&eacute;s d&rsquo;une t&ecirc;te ou d&rsquo;un masque. Leur fonction &eacute;tait de prot&eacute;ger les maisons. Ces masques &eacute;taient mis sur les fa&ccedil;ades des habitations pour repousser les mauvais esprits et ainsi, s&rsquo;attirer les faveurs des dieux ! Ils arrivent donc dans notre ville &agrave; la fin du XVIe si&egrave;cle par le ma&icirc;tre ma&ccedil;on Henri Roche. Puis les mascarons se diffusent dans toute la ville au XVIIIe si&egrave;cle gr&acirc;ce aux grands travaux entrepris par l&rsquo;intendant Tourny (Si vous ne le connaissez pas, cet homme a permis &agrave; Bordeaux de se transformer, la ville lui doit beaucoup). Les mascarons ornent chaque recoin de la ville de Bordeaux, &agrave; tel point qu&rsquo;on la surnomme &ldquo;la ville aux masques&rdquo;.', 'Les Mascarons de Bordeaux, figures du XVIe si&egrave;cle :', 'Reconna&icirc;tre les diff&eacute;rents mascarons de Bordeaux n&rsquo;est pas simple, mais la bonne nouvelle, c&rsquo;est que c&rsquo;est possible de les diff&eacute;rencier ! Et oui, la plupart des mascarons de Bordeaux ont pour inspiration les dieux antiques, que l&rsquo;on peut reconna&icirc;tre gr&acirc;ce aux attributs qui ornent leurs cartouches. Ainsi, il est ais&eacute; de reconna&icirc;tre une repr&eacute;sentation divine. Vous allez impressionner votre famille et vos amis en leur montrant un mascaron et en leur donnant son identit&eacute; ! Par exemple, Minerve est repr&eacute;sent&eacute;e avec une chouette &agrave; ses c&ocirc;t&eacute;s, la foudre pour Jupiter, un trident et/ou un gouvernail pour Neptune. Parfois, vous pourrez voir des t&ecirc;tes animales, cornues pour les satyres, des lions &eacute;dent&eacute;s&hellip; Et aussi des repr&eacute;sentations de femmes noires ! A votre avis, pourquoi des repr&eacute;sentations de femmes noires ? Il faut remonter assez loin dans le temps, &agrave; l&rsquo;&eacute;poque du commerce triangulaire&hellip; &Ccedil;a y est, vous voyez o&ugrave; je veux en venir ? Eh oui, ces repr&eacute;sentations sont des r&eacute;f&eacute;rences &agrave; la traite n&eacute;gri&egrave;re. Les mascarons refl&egrave;tent l&rsquo;histoire de la ville : la colonisation et l&rsquo;esclavage ont beaucoup particip&eacute; &agrave; la richesse de Bordeaux, tant par la traite n&eacute;gri&egrave;re que par le commerce de denr&eacute;es cultiver par les esclaves. Ainsi, de nombreux mascarons Bordelais gardent la m&eacute;moire de cette histoire et repr&eacute;sentent donc des visages africains.', 'Un visage parmi tant d&rsquo;autres :', 'Apr&egrave;s toutes ces informations sur les mascarons, encore faut-il les trouver, savoir o&ugrave; ils sont&hellip;Pas facile de les apercevoir...\r\nDe balade en balade, j&rsquo;ai rep&eacute;r&eacute; un certain nombre de rues, o&ugrave; les mascarons sont nombreux, &agrave; peine visibles, cach&eacute;s sur les fa&ccedil;ades des maisons, discrets, intimidants, comiques pour certains&hellip; Voici alors quelques parcours pour d&eacute;couvrir Bordeaux d&rsquo;un nouvel &oelig;il ! Des balades &ldquo;Fast&rdquo; d\'&agrave; peine 10 minutes, aux balades de plus de 30 minutes ! \r\n\r\nBalade Fast (~10 minutes):\r\nAll&eacute;es de Tourny -&amp;gt; Rue Mautrec -&amp;gt; Rue du pont de la Mousque -&amp;gt; Place Gabriel.\r\nTrajet de 9 minutes &agrave; pied, 3 minutes en v&eacute;lo, 700 m&egrave;tres environ !\r\nRue du Mirail -&amp;gt; Cours Victor Hugo -&amp;gt; Place Pey Berland .\r\nTrajet de 13 minutes &agrave; pied, 5 minutes en v&eacute;lo, 1,1 km environ !\r\n\r\nBalade Simple (~20 minutes):\r\nRue de Pessac -&amp;gt; Rue Th&eacute;odore Gard&egrave;re -&amp;gt; Rue Leyteire.\r\nTrajet de 23 minutes &agrave; pied, 10 minutes en v&eacute;lo, 2,5 km environ !\r\nRue David Johnston -&amp;gt; Rue Camille Godard -&amp;gt; Cours de la Martinique.\r\nTrajet de 21 minutes &agrave; pied, 8 minutes en v&eacute;lo, 1,7 km environ !\r\n\r\nBalade Longue (~30 minutes ou plus):  \r\nCours de l&rsquo;Yser -&amp;gt; Cours Aristide Briand -&amp;gt; Rue Malbec -&amp;gt; Rue Cadaujac -&amp;gt; Cours de la Somme.\r\nTrajet de 33 minutes &agrave; pied, 12 minutes en v&eacute;lo, 2,6 km environ !\r\nCours de la Somme -&amp;gt; Rue de Serpolet -&amp;gt; Rue des Trois Conils.\r\nTrajet de 30 minutes &agrave; pied, 11 minutes en v&eacute;lo, 2,3 km environ !\r\nRue Lachassaigne -&amp;gt; Rue de Mexico -&amp;gt; Rue de Capdeville.\r\nTrajet de 39 minutes &agrave; pied, 17 minutes en v&eacute;lo, 3,7 km environ !', 'J&rsquo;esp&egrave;re que je vous aurais &eacute;t&eacute; utile dans vos recherches de l&rsquo;histoire de Bordeaux et vous aurait donn&eacute; envie de visiter la ville sous un nouveau jour, ou plut&ocirc;t, sous un nouveau regard ! N\'oubliez pas de partager les mascarons qui vous auront le plus plu, et o&ugrave; vous les avez trouver ! Et le plus important, n&rsquo;h&eacute;sitez pas &agrave; vous &eacute;carter des sentiers battus pour d&eacute;couvrir d&rsquo;autres visages peu connus ! Il y en a environ 3000, rien qu&rsquo;&agrave; Bordeaux ! Arriverez-vous &agrave; tous les trouver ?', 'banniere_mascarons.png', 'ANGL0106', 'THE0104');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `numSeqCom` int(10) NOT NULL,
  `numArt` int(8) NOT NULL,
  `dtCreCom` datetime DEFAULT NULL,
  `libCom` text NOT NULL,
  `attModOK` tinyint(1) DEFAULT 0,
  `affComOK` tinyint(1) DEFAULT 0,
  `notifComKOAff` text DEFAULT NULL,
  `delLogiq` tinyint(1) DEFAULT 0,
  `numMemb` int(10) NOT NULL,
  PRIMARY KEY (`numSeqCom`,`numArt`),
  KEY `COMMENT_FK` (`numSeqCom`,`numArt`),
  KEY `FK_ASSOCIATION_8` (`numArt`),
  KEY `FK_ASSOCIATION_9` (`numMemb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`numSeqCom`, `numArt`, `dtCreCom`, `libCom`, `attModOK`, `affComOK`, `notifComKOAff`, `delLogiq`, `numMemb`) VALUES
(1, 1, '2020-11-09 10:13:43', 'Trop cool comme article', 1, 1, NULL, 0, 1),
(1, 2, '2020-11-09 18:24:21', 'Trop cool comme article', 1, 1, NULL, 0, 3),
(1, 3, '2020-11-09 15:31:17', 'Trop cool comme article', 1, 1, NULL, 0, 3),
(1, 4, '2021-02-25 01:59:08', 'cezlkclezkc', 0, 0, NULL, 0, 2),
(1, 26, '2021-02-25 01:35:15', 'coucoucucuc', 0, 0, NULL, 0, 1),
(1, 27, '2021-02-25 01:55:36', 'nkjvnejfnkjerv', 0, 0, NULL, 0, 4),
(1, 29, '2021-02-25 01:52:24', 'alyssa', 0, 0, NULL, 0, 4),
(1, 31, '2021-02-25 01:55:10', 'maxime', 0, 0, NULL, 0, 1),
(1, 39, '2021-02-25 02:00:31', 'coucou', 0, 0, NULL, 0, 7),
(1, 49, '2021-02-25 01:56:58', 'popo', 0, 0, NULL, 0, 1),
(1, 52, '2021-02-27 03:58:02', 'Trop cool', 1, 1, NULL, 0, 12),
(2, 1, '2020-11-02 13:18:42', 'Trop cool comme article', 1, 1, NULL, 0, 2),
(2, 2, '2020-11-02 16:29:16', 'Trop cool comme article', 1, 1, NULL, 0, 3),
(2, 3, '2020-12-15 08:31:23', 'Trop cool comme article', 1, 1, NULL, 0, 2),
(2, 52, '2021-02-28 03:37:09', 'LKEZD', 0, 0, NULL, 0, 13),
(3, 1, '2020-11-04 16:21:12', 'Trop cool comme article', 1, 1, NULL, 0, 3),
(3, 2, '2020-11-04 08:16:44', 'Trop cool comme article', 1, 1, NULL, 0, 2),
(3, 3, '2020-12-19 06:28:00', 'Trop cool comme article', 1, 1, NULL, 0, 5),
(3, 52, '2021-02-28 03:37:15', 'KFFKFK', 0, 0, NULL, 0, 13),
(4, 1, '2020-11-05 03:15:38', 'Trop cool comme article', 1, 1, NULL, 0, 1),
(4, 2, '2020-11-05 14:27:39', 'Trop cool comme article', 1, 1, NULL, 0, 3),
(4, 3, '2020-12-28 07:30:21', 'Trop cool comme article', 1, 1, NULL, 0, 3),
(4, 52, '2021-02-28 03:50:24', 'Tr&egrave;s int&eacute;ressant', 1, 1, NULL, 0, 13),
(5, 1, '2020-11-06 21:16:36', 'Trop cool comme article', 1, 1, NULL, 0, 4),
(5, 2, '2020-11-06 06:31:42', 'Trop cool comme article', 1, 1, NULL, 0, 1),
(5, 3, '2020-12-29 17:31:38', 'Trop cool comme article', 1, 1, NULL, 0, 1),
(5, 52, '2021-02-28 03:53:14', 'trop bien', 0, 0, NULL, 0, 13),
(6, 1, '2020-11-06 11:20:31', 'Trop cool comme article', 1, 1, NULL, 0, 5),
(6, 2, '2020-11-06 23:50:27', 'Trop cool comme article', 1, 1, NULL, 0, 5),
(6, 3, '2020-12-29 09:31:27', 'Pourri trop, trop comme article', 0, 0, 'Trop insultant', 0, 4),
(6, 52, '2021-02-28 03:53:54', 'trop cooolll', 0, 0, NULL, 0, 13),
(7, 1, '2020-11-08 08:41:12', 'Trop cool comme article', 1, 1, NULL, 0, 5),
(7, 2, '2020-11-08 10:37:23', 'Trop pourri comme article', 0, 0, 'Manque de bienveillance', 0, 2),
(7, 3, '2020-12-02 16:33:41', 'Trop cool comme article', 1, 1, NULL, 0, 3),
(7, 52, '2021-03-01 03:52:58', 'trop bien', 0, 0, NULL, 0, 13),
(8, 1, '2020-11-18 08:41:12', 'De la daube cet article', 0, 0, 'Trop insultant', 0, 1),
(8, 2, '2021-02-25 01:47:41', 'ijfkzejkfjze', 0, 0, NULL, 0, 2),
(8, 3, '2020-12-03 12:41:47', 'De la daube cet article', 0, 0, 'Trop insultant', 0, 2),
(9, 1, '2021-02-25 01:36:26', 'popo', 0, 0, NULL, 0, 1),
(9, 2, '2021-02-25 01:49:54', 'cmlzeklfkez', 0, 0, NULL, 0, 2),
(9, 3, '2020-12-04 10:33:42', 'Trop cool comme article', 1, 1, NULL, 0, 5),
(10, 2, '2021-02-25 01:51:32', 'alyssa', 0, 0, NULL, 0, 7),
(10, 3, '2021-02-25 01:35:01', 'lkqldlzald', 1, 1, NULL, 0, 3),
(11, 2, '2021-02-25 01:53:04', 'edlklmekzldkzelkd', 0, 0, NULL, 0, 1),
(11, 3, '2021-02-25 01:50:40', 'lfklezf', 0, 0, NULL, 0, 2),
(12, 3, '2021-02-25 01:51:14', 'fmelzmfemz', 0, 0, NULL, 0, 2),
(13, 3, '2021-02-25 01:52:06', 'melzmflzem', 0, 0, NULL, 0, 6),
(14, 3, '2021-02-25 01:54:19', 'znfknzkefnzekjnzej', 0, 0, NULL, 0, 3),
(15, 3, '2021-02-25 01:54:34', 'alyssa', 1, 1, NULL, 0, 7);

-- --------------------------------------------------------

--
-- Structure de la table `commentplus`
--

DROP TABLE IF EXISTS `commentplus`;
CREATE TABLE IF NOT EXISTS `commentplus` (
  `numSeqCom` int(10) NOT NULL,
  `numArt` int(8) NOT NULL,
  `numSeqComR` int(10) NOT NULL,
  `numArtR` int(8) NOT NULL,
  PRIMARY KEY (`numSeqCom`,`numArt`,`numSeqComR`,`numArtR`),
  KEY `COMMENTPLUS_FK` (`numSeqCom`,`numArt`,`numSeqComR`,`numArtR`),
  KEY `FK_COMMENTPLUS` (`numSeqComR`,`numArtR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentplus`
--

INSERT INTO `commentplus` (`numSeqCom`, `numArt`, `numSeqComR`, `numArtR`) VALUES
(1, 1, 3, 1),
(1, 1, 4, 1),
(1, 1, 6, 1),
(1, 1, 7, 1),
(1, 1, 8, 1),
(1, 2, 2, 2),
(1, 3, 2, 3),
(1, 3, 3, 3),
(1, 3, 4, 3),
(2, 3, 6, 3),
(2, 3, 7, 3),
(3, 2, 4, 2),
(3, 2, 5, 2),
(4, 3, 8, 3),
(4, 3, 9, 3),
(5, 2, 6, 2),
(6, 2, 7, 2);

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `numLang` char(8) NOT NULL,
  `lib1Lang` char(30) DEFAULT NULL,
  `lib2Lang` char(60) DEFAULT NULL,
  `numPays` char(4) DEFAULT NULL,
  PRIMARY KEY (`numLang`),
  KEY `LANGUE_FK` (`numLang`),
  KEY `FK_ASSOCIATION_7` (`numPays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`numLang`, `lib1Lang`, `lib2Lang`, `numPays`) VALUES
('ALLE01', 'Allemand(e)', 'Langue allemande', 'ALLE'),
('ANGL01', 'Anglais(e)', 'Langue anglaise', 'ANGL'),
('BULG01', 'Bulgare', 'Langue bulgare', 'BULG'),
('ESPA01', 'Espagnol(e)', 'Langue espagnole', 'ESPA'),
('FRAN01', 'Français(e)', 'Langue française', 'FRAN'),
('ITAL01', 'Italien(ne)', 'Langue italienne', 'ITAL'),
('RUSS01', 'Russe', 'Langue russe', 'RUSS'),
('UKRA01', 'Ukrainien(ne)', 'Langue ukrainienne', 'UKRA');

-- --------------------------------------------------------

--
-- Structure de la table `likeart`
--

DROP TABLE IF EXISTS `likeart`;
CREATE TABLE IF NOT EXISTS `likeart` (
  `numMemb` int(10) NOT NULL,
  `numArt` int(8) NOT NULL,
  `likeA` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`numMemb`,`numArt`),
  KEY `LIKEART_FK` (`numMemb`,`numArt`),
  KEY `FK_LIKEART` (`numArt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `likeart`
--

INSERT INTO `likeart` (`numMemb`, `numArt`, `likeA`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 47, 1),
(2, 1, 0),
(2, 2, 1),
(2, 3, 1),
(2, 5, 1),
(3, 1, 1),
(3, 2, 1),
(3, 3, 1),
(4, 1, 0),
(4, 2, 1),
(4, 3, 1),
(4, 49, 1),
(5, 2, 1),
(6, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `likecom`
--

DROP TABLE IF EXISTS `likecom`;
CREATE TABLE IF NOT EXISTS `likecom` (
  `numMemb` int(10) NOT NULL,
  `numSeqCom` int(10) NOT NULL,
  `numArt` int(8) NOT NULL,
  `likeC` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`numMemb`,`numSeqCom`,`numArt`),
  KEY `LIKECOM_FK` (`numMemb`,`numSeqCom`,`numArt`),
  KEY `FK_LIKECOM` (`numSeqCom`,`numArt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `likecom`
--

INSERT INTO `likecom` (`numMemb`, `numSeqCom`, `numArt`, `likeC`) VALUES
(1, 1, 1, 1),
(2, 4, 2, 1),
(3, 1, 1, 0),
(3, 3, 3, 1),
(3, 4, 2, 1),
(4, 6, 3, 1),
(4, 7, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `numMemb` int(10) NOT NULL AUTO_INCREMENT,
  `prenomMemb` varchar(70) DEFAULT NULL,
  `nomMemb` varchar(70) DEFAULT NULL,
  `pseudoMemb` varchar(70) DEFAULT NULL,
  `passMemb` varchar(70) DEFAULT NULL,
  `eMailMemb` varchar(100) DEFAULT NULL,
  `dtCreaMemb` datetime DEFAULT NULL,
  `souvenirMemb` tinyint(1) DEFAULT NULL,
  `accordMemb` tinyint(1) DEFAULT NULL,
  `idStat` int(5) NOT NULL,
  PRIMARY KEY (`numMemb`),
  KEY `MEMBRE_FK` (`numMemb`),
  KEY `FK_ASSOCIATION_10` (`idStat`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`numMemb`, `prenomMemb`, `nomMemb`, `pseudoMemb`, `passMemb`, `eMailMemb`, `dtCreaMemb`, `souvenirMemb`, `accordMemb`, `idStat`) VALUES
(1, 'Jean', 'Dupont', 'Phil09', 'Ut!D5?h0', 'Phil09@me.com', '2020-01-09 10:13:43', 1, 1, 1),
(2, 'Julie', 'La Rousse', 'juju1989', 'G54;Q22mi5', 'julie@gmail.com', '2020-03-15 14:33:23', 0, 1, 3),
(3, 'David', 'Bowie', 'dav33B', '$2y$10$VegFFyizjKBC2jnTKc1lhOE8AEuNWN6vVGTvKuxswMQ7Z5OQd9Vjy', 'david.bowie@gmail.com', '2021-02-12 04:17:55', 1, 1, 4),
(4, 'Phililiiijvzjkkz', 'Collinskclkclk', 'cols2Plkcc', '$2y$10$iEk1FeOIRrsS8qWejldOf.p30YT/NOraaCGLr4uQ.0mIM/WQ0SaCe', 'phil.collins@me.com', '2021-02-12 03:53:03', 1, 1, 2),
(5, 'Prince', 'Rogers Nelson dit PRINCE', 'Rogers222', 'frI3!Px;21', 'prince@gmail.com', '2020-12-14 13:24:23', 0, 1, 9),
(6, 'zjlkfjkz', 'cklzsfez', 'kclzekcze', '$2y$10$DuKYRy1ABV5TmOduuVghF.lUglMQyRLb3Mx9pzrNqHSvix8MsLglK', 'dsc,klcd', '2021-02-12 03:08:41', 1, 1, 1),
(7, 'fhf', 'clsdklc', 'cmlkcml', '$2y$10$RiH4yMN9qPuNy6moyrZpl.iApCwY.hxq32am7ltNPWq.7TkiP6aEm', 'lo@mmi.com', '2021-02-12 03:28:43', 1, 1, 1),
(9, 'uii', 'ii', 'ui', '$2y$10$KUzGivrF/.KiIA7Py7xt3eWjbK0VJOunNu9A2kw35dJhkwv/cp1AG', 'popo@mmi.com', '2021-02-26 09:16:32', 1, 1, 1),
(10, 'IUIY', 'IYIU', 'ui', '$2y$10$pFp7h8ZJPfXkoUNjxT0tGeDc20SIa3Hho/2HApXdRh83ceazmgYSu', 'p@mmi.com', '2021-02-26 11:53:58', 1, 1, 1),
(11, 'ijii', 'iu', 'iuui', '$2y$10$31RfjoRpCqBgchN1HFCV9eGf7sDl86ki06cKAD/yykF22Zs7qyACa', 'p@mmi.com', '2021-02-26 12:01:17', 1, 1, 1),
(12, 'lo', 'll', 'flavie', '$2y$10$zoGqrxO0UV/Np/b/l373.e.XKxaunlT/SRYeN1Gt/hKHJaa.h0c3q', 'flavie@mmi.com', '2021-02-26 01:44:27', 1, 1, 1),
(13, 'kj', 'kj', 'max', 'max', 'max@mmi.com', '2021-02-26 02:13:44', 1, 1, 1),
(14, 'OOIOIOIOioioio', 'ioioioio', 'mmmmmmmmm', 'momo', 'momo@mmi.com', '2021-03-01 04:54:55', 1, 1, 1),
(15, 'yyu', 'yuyy', 'yuyy', 'momo', 'p@mmi.com', '2021-03-01 05:48:33', 1, 1, 1),
(16, 'iiououoiuiui', 'iuiuiuiui', 'iuiuiuiuu', 'ui', 'ui@mmi.com', '2021-03-01 05:49:36', 1, 1, 1),
(17, 'iui', 'uiiuuuu', 'uuuuuuuuu', 'o', 'popo@mmi.com', '2021-03-01 05:57:35', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `motcle`
--

DROP TABLE IF EXISTS `motcle`;
CREATE TABLE IF NOT EXISTS `motcle` (
  `numMotCle` int(8) NOT NULL AUTO_INCREMENT,
  `libMotCle` varchar(60) DEFAULT NULL,
  `numLang` char(8) NOT NULL,
  PRIMARY KEY (`numMotCle`),
  KEY `MOTCLE_FK` (`numMotCle`),
  KEY `FK_ASSOCIATION_5` (`numLang`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `motcle`
--

INSERT INTO `motcle` (`numMotCle`, `libMotCle`, `numLang`) VALUES
(1, 'Bordeaux', 'FRAN01'),
(2, 'CHU', 'FRAN01'),
(3, 'chirurgiens', 'FRAN01'),
(4, 'Hôpital', 'FRAN01'),
(5, 'soignants', 'FRAN01'),
(6, 'bleu', 'FRAN01'),
(7, 'Mars Bleu', 'FRAN01'),
(8, 'Base', 'FRAN01'),
(9, 'sous-marine', 'FRAN01'),
(10, 'Base sous-marine', 'FRAN01'),
(11, 'port de la Lune', 'FRAN01'),
(12, 'histoire', 'FRAN01'),
(13, 'Art', 'FRAN01'),
(14, 'Stalingrad', 'FRAN01'),
(15, 'Pont', 'FRAN01'),
(16, 'Pont de Pierre', 'FRAN01'),
(17, 'Lion bleu', 'FRAN01'),
(18, 'sculpture', 'FRAN01'),
(19, 'Veilhan', 'FRAN01'),
(20, 'blue', 'ANGL01'),
(21, 'Bordeaux', 'ANGL01'),
(22, 'base', 'ANGL01'),
(23, 'submarine', 'ANGL01'),
(24, 'submarine base', 'ANGL01'),
(25, 'Port of the Moon', 'ANGL01'),
(26, 'history', 'ANGL01'),
(27, 'Art', 'ANGL01'),
(28, 'Stalingrad', 'ANGL01'),
(29, 'bridge', 'ANGL01'),
(30, 'stone bridge', 'ANGL01'),
(31, 'Blue Lion', 'ANGL01'),
(32, 'sculpture', 'ANGL01'),
(33, 'Veilhan', 'ANGL01'),
(34, 'blau', 'ALLE01'),
(35, 'bordeaux', 'ALLE01'),
(36, 'kinder', 'ALLE01'),
(37, 'zuhause', 'ALLE01'),
(38, 'menschen', 'ALLE01'),
(39, 'süße', 'ALLE01'),
(40, 'freund', 'ALLE01'),
(41, 'wagen', 'ALLE01'),
(42, 'hafen', 'ALLE01'),
(43, 'brücke', 'ALLE01'),
(44, 'stein', 'ALLE01'),
(45, 'Löwe', 'ALLE01'),
(46, 'sprungbrett', 'ALLE01'),
(49, 'Base sous marine', 'FRAN01'),
(50, 'Guerre', 'ALLE01'),
(51, 'histoire', 'FRAN01'),
(52, 'b&eacute;ton', 'FRAN01'),
(53, 'Espagne', 'FRAN01'),
(54, 'Art', 'FRAN01'),
(55, 'Rue', 'FRAN01'),
(56, 'Ill&eacute;gal', 'FRAN01'),
(57, 'Peinture', 'FRAN01'),
(58, 'Couleurs', 'FRAN01'),
(59, 'Sculpture', 'FRAN01'),
(60, 'Visage', 'FRAN01'),
(61, 'Cach&eacute;', 'FRAN01'),
(62, 'Esclavage', 'FRAN01'),
(63, 'Pierre', 'FRAN01');

-- --------------------------------------------------------

--
-- Structure de la table `motclearticle`
--

DROP TABLE IF EXISTS `motclearticle`;
CREATE TABLE IF NOT EXISTS `motclearticle` (
  `numArt` int(8) NOT NULL,
  `numMotCle` int(8) NOT NULL,
  PRIMARY KEY (`numArt`,`numMotCle`),
  KEY `MOTCLEARTICLE_FK` (`numArt`),
  KEY `MOTCLEARTICLE2_FK` (`numMotCle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `motclearticle`
--

INSERT INTO `motclearticle` (`numArt`, `numMotCle`) VALUES
(1, 14),
(2, 4),
(3, 19),
(4, 11),
(4, 20),
(4, 21),
(4, 22),
(4, 23),
(4, 24),
(4, 25),
(4, 26),
(4, 27),
(5, 28),
(26, 20),
(27, 45),
(28, 35),
(44, 36),
(44, 37),
(44, 38),
(45, 41),
(45, 43),
(45, 45),
(46, 3),
(46, 7),
(46, 10),
(47, 2),
(47, 3),
(47, 5),
(48, 2),
(48, 8),
(48, 10),
(49, 32),
(50, 18),
(50, 60),
(50, 61),
(50, 62),
(50, 63),
(51, 1),
(51, 10),
(52, 1),
(53, 36),
(53, 39),
(54, 36),
(55, 1),
(55, 13),
(55, 55),
(55, 56),
(55, 57),
(55, 58),
(56, 1),
(56, 10),
(56, 12),
(56, 61),
(57, 1),
(57, 59),
(57, 60),
(57, 61);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `numPays` char(4) NOT NULL,
  `cdPays` char(2) NOT NULL,
  `frPays` varchar(255) NOT NULL,
  `enPays` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`numPays`),
  KEY `PAYS_FK` (`numPays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`numPays`, `cdPays`, `frPays`, `enPays`) VALUES
('AFGH', 'AF', 'Afghanistan', 'Afghanistan'),
('AFRI', 'ZA', 'Afrique du Sud', 'South Africa'),
('ALBA', 'AL', 'Albanie', 'Albania'),
('ALGE', 'DZ', 'Algérie', 'Algeria'),
('ALLE', 'DE', 'Allemagne', 'Germany'),
('ANDO', 'AD', 'Andorre', 'Andorra'),
('ANGL', 'GB', 'Royaume-Uni', 'United Kingdom'),
('ANGO', 'AO', 'Angola', 'Angola'),
('ANGU', 'AI', 'Anguilla', 'Anguilla'),
('ANTG', 'AG', 'Antigua-et-Barbuda', 'Antigua & Barbuda'),
('ANTI', 'AN', 'Antilles néerlandaises', 'Netherlands Antilles'),
('ARAB', 'SA', 'Arabie saoudite', 'Saudi Arabia'),
('ARGE', 'AR', 'Argentine', 'Argentina'),
('ARME', 'AM', 'Arménie', 'Armenia'),
('ARTA', 'AQ', 'Antarctique', 'Antarctica'),
('ARUB', 'AW', 'Aruba', 'Aruba'),
('AUST', 'AU', 'Australie', 'Australia'),
('AUTR', 'AT', 'Autriche', 'Austria'),
('AZER', 'AZ', 'Azerbaïdjan', 'Azerbaijan'),
('BAHA', 'BS', 'Bahamas', 'Bahamas, The'),
('BAHR', 'BH', 'Bahreïn', 'Bahrain'),
('BANG', 'BD', 'Bangladesh', 'Bangladesh'),
('BARB', 'BB', 'Barbade', 'Barbados'),
('BELA', 'PW', 'Belau', 'Palau'),
('BELG', 'BE', 'Belgique', 'Belgium'),
('BELI', 'BZ', 'Belize', 'Belize'),
('BENI', 'BJ', 'Bénin', 'Benin'),
('BERM', 'BM', 'Bermudes', 'Bermuda'),
('BHOU', 'BT', 'Bhoutan', 'Bhutan'),
('BIEL', 'BY', 'Biélorussie', 'Belarus'),
('BIRM', 'MM', 'Birmanie', 'Myanmar (ex-Burma)'),
('BOIN', 'IO', 'Territoire britannique de l Océan Indien', 'British Indian Ocean Territory'),
('BOLV', 'BO', 'Bolivie', 'Bolivia'),
('BOSN', 'BA', 'Bosnie-Herzégovine', 'Bosnia and Herzegovina'),
('BOTS', 'BW', 'Botswana', 'Botswana'),
('BOUV', 'BV', 'Ile Bouvet', 'Bouvet Island'),
('BRES', 'BR', 'Brésil', 'Brazil'),
('BRUN', 'BN', 'Brunei', 'Brunei Darussalam'),
('BULG', 'BG', 'Bulgarie', 'Bulgaria'),
('BURK', 'BF', 'Burkina Faso', 'Burkina Faso'),
('BURU', 'BI', 'Burundi', 'Burundi'),
('CAFR', 'CF', 'République centrafricaine', 'Central African Republic'),
('CAMB', 'KH', 'Cambodge', 'Cambodia'),
('CAME', 'CM', 'Cameroun', 'Cameroon'),
('CANA', 'CA', 'Canada', 'Canada'),
('CAYM', 'KY', 'Iles Cayman', 'Cayman Islands'),
('CHIL', 'CL', 'Chili', 'Chile'),
('CHIN', 'CN', 'Chine', 'China'),
('CHRI', 'CX', 'Ile Christmas', 'Christmas Island'),
('CHYP', 'CY', 'Chypre', 'Cyprus'),
('CNOR', 'KP', 'Corée du Nord', 'Korea, Demo. People s Rep. of'),
('COCO', 'CC', 'Iles des Cocos (Keeling)', 'Cocos (Keeling) Islands'),
('COLO', 'CO', 'Colombie', 'Colombia'),
('COMO', 'KM', 'Comores', 'Comoros'),
('CON1', 'CD', 'République démocratique du Congo', 'Congo, Democratic Rep. of the'),
('CON2', 'CG', 'Congo', 'Congo'),
('COOK', 'CK', 'Iles Cook', 'Cook Islands'),
('CROA', 'HR', 'Croatie', 'Croatia'),
('CSUD', 'KR', 'Corée du Sud', 'Korea, (South) Republic of'),
('CUBA', 'CU', 'Cuba', 'Cuba'),
('CVER', 'CV', 'Cap-Vert', 'Cape Verde'),
('DANE', 'DK', 'Danemark', 'Denmark'),
('DJIB', 'DJ', 'Djibouti', 'Djibouti'),
('DOM1', 'DM', 'Dominique', 'Dominica'),
('DOM2', 'DO', 'République dominicaine', 'Dominican Republic'),
('EGYP', 'EG', 'Égypte', 'Egypt'),
('EMIR', 'AE', 'Émirats arabes unis', 'United Arab Emirates'),
('EQUA', 'EC', 'Équateur', 'Ecuador'),
('ERYT', 'ER', 'Érythrée', 'Eritrea'),
('ESPA', 'ES', 'Espagne', 'Spain'),
('ESTO', 'EE', 'Estonie', 'Estonia'),
('ETHO', 'ET', 'Éthiopie', 'Ethiopia'),
('FALK', 'FK', 'Iles Falkland', 'Falkland Islands (Malvinas)'),
('FERO', 'FO', 'Iles Féroé', 'Faroe Islands'),
('FIDJ', 'FJ', 'Iles Fidji', 'Fiji'),
('FINL', 'FI', 'Finlande', 'Finland'),
('FRAN', 'FR', 'France', 'France'),
('GABO', 'GA', 'Gabon', 'Gabon'),
('GAMB', 'GM', 'Gambie', 'Gambia, the'),
('GANA', 'GH', 'Ghana', 'Ghana'),
('GEO1', 'GE', 'Géorgie', 'Georgia'),
('GEO2', 'GS', 'Iles Géorgie du Sud et Sandwich du Sud', 'S. Georgia and S. Sandwich Is.'),
('GIBR', 'GI', 'Gibraltar', 'Gibraltar'),
('GREC', 'GR', 'Grèce', 'Greece'),
('GREN', 'GD', 'Grenade', 'Grenada'),
('GROE', 'GL', 'Groenland', 'Greenland'),
('GUAD', 'GP', 'Guadeloupe', 'Guinea, Equatorial'),
('GUAM', 'GU', 'Guam', 'Guam'),
('GUAT', 'GT', 'Guatemala', 'Guatemala'),
('GUIB', 'GW', 'Guinée-Bissao', 'Guinea-Bissau'),
('GUIE', 'GQ', 'Guinée équatoriale', 'Equatorial Guinea'),
('GUIN', 'GN', 'Guinée', 'Guinea'),
('GUYA', 'GY', 'Guyana', 'Guyana'),
('GUYF', 'GF', 'Guyane française', 'Guiana, French'),
('HAIT', 'HT', 'Haïti', 'Haiti'),
('HEAR', 'HM', 'Iles Heard et McDonald', 'Heard and McDonald Islands'),
('HOND', 'HN', 'Honduras', 'Honduras'),
('HONG', 'HU', 'Hongrie', 'Hungary'),
('INDE', 'IN', 'Inde', 'India'),
('INDO', 'ID', 'Indonésie', 'Indonesia'),
('IRAN', 'IR', 'Iran', 'Iran, Islamic Republic of'),
('IRAQ', 'IQ', 'Iraq', 'Iraq'),
('IRLA', 'IE', 'Irlande', 'Ireland'),
('ISLA', 'IS', 'Islande', 'Iceland'),
('ISRA', 'IL', 'Israël', 'Israel'),
('ITAL', 'IT', 'Italie', 'Italy'),
('IVOI', 'CI', 'Côte d\'Ivoire', 'Ivory Coast (see Cote d\'Ivoire)'),
('JAMA', 'JM', 'Jamaïque', 'Jamaica'),
('JAPO', 'JP', 'Japon', 'Japan'),
('JORD', 'JO', 'Jordanie', 'Jordan'),
('KAZA', 'KZ', 'Kazakhstan', 'Kazakhstan'),
('KIRG', 'KG', 'Kirghizistan', 'Kyrgyzstan'),
('KIRI', 'KI', 'Kiribati', 'Kiribati'),
('KNYA', 'KE', 'Kenya', 'Kenya'),
('KONG', 'HK', 'Hong Kong', 'Hong Kong, (China)'),
('KWEI', 'KW', 'Koweït', 'Kuwait'),
('LAOS', 'LA', 'Laos', 'Lao People s Democratic Republic'),
('LEON', 'SL', 'Sierra Leone', 'Sierra Leone'),
('LESO', 'LS', 'Lesotho', 'Lesotho'),
('LETT', 'LV', 'Lettonie', 'Latvia'),
('LIBA', 'LB', 'Liban', 'Lebanon'),
('LIBE', 'LR', 'Liberia', 'Liberia'),
('LIBY', 'LY', 'Libye', 'Libyan Arab Jamahiriya'),
('LIEC', 'LI', 'Liechtenstein', 'Liechtenstein'),
('LITU', 'LT', 'Lituanie', 'Lithuania'),
('LUXE', 'LU', 'Luxembourg', 'Luxembourg'),
('MACA', 'MO', 'Macao', 'Macao, (China)'),
('MACE', 'MK', 'ex-République yougoslave de Macédoine', 'Macedonia, TFYR'),
('MADA', 'MG', 'Madagascar', 'Madagascar'),
('MALA', 'MY', 'Malaisie', 'Malaysia'),
('MALD', 'MV', 'Maldives', 'Maldives'),
('MALI', 'ML', 'Mali', 'Mali'),
('MALT', 'MT', 'Malte', 'Malta'),
('MALW', 'MW', 'Malawi', 'Malawi'),
('MARI', 'MP', 'Mariannes du Nord', 'Northern Mariana Islands'),
('MARO', 'MA', 'Maroc', 'Morocco'),
('MARS', 'MH', 'Iles Marshall', 'Marshall Islands'),
('MART', 'MQ', 'Martinique', 'Martinique'),
('MAUC', 'MU', 'Maurice', 'Mauritius'),
('MAUR', 'MR', 'Mauritanie', 'Mauritania'),
('MAYO', 'YT', 'Mayotte', 'Mayotte'),
('MEXI', 'MX', 'Mexique', 'Mexico'),
('MICR', 'FM', 'Micronésie', 'Micronesia, Federated States of'),
('MINE', 'UM', 'Iles mineures éloignées des États-Unis', 'US Minor Outlying Islands'),
('MOLD', 'MD', 'Moldavie', 'Moldova, Republic of'),
('MONA', 'MC', 'Monaco', 'Monaco'),
('MONG', 'MN', 'Mongolie', 'Mongolia'),
('MONS', 'MS', 'Montserrat', 'Montserrat'),
('MOZA', 'MZ', 'Mozambique', 'Mozambique'),
('NAMI', 'NA', 'Namibie', 'Namibia'),
('NAUR', 'NR', 'Nauru', 'Nauru'),
('NEPA', 'NP', 'Népal', 'Nepal'),
('NICA', 'NI', 'Nicaragua', 'Nicaragua'),
('NIEV', 'KN', 'Saint-Christophe-et-Niévès', 'Saint Kitts and Nevis'),
('NIGA', 'NG', 'Nigeria', 'Nigeria'),
('NIGE', 'NE', 'Niger', 'Niger'),
('NIOU', 'NU', 'Nioué', 'Niue'),
('NORF', 'NF', 'Ile Norfolk', 'Norfolk Island'),
('NORV', 'NO', 'Norvège', 'Norway'),
('NOUC', 'NC', 'Nouvelle-Calédonie', 'New Caledonia'),
('NOUZ', 'NZ', 'Nouvelle-Zélande', 'New Zealand'),
('OMAN', 'OM', 'Oman', 'Oman'),
('OUGA', 'UG', 'Ouganda', 'Uganda'),
('OUZE', 'UZ', 'Ouzbékistan', 'Uzbekistan'),
('PAKI', 'PK', 'Pakistan', 'Pakistan'),
('PANA', 'PA', 'Panama', 'Panama'),
('PAPU', 'PG', 'Papouasie-Nouvelle-Guinée', 'Papua New Guinea'),
('PARA', 'PY', 'Paraguay', 'Paraguay'),
('PBAS', 'NL', 'pays-Bas', 'Netherlands'),
('PERO', 'PE', 'Pérou', 'Peru'),
('PHIL', 'PH', 'Philippines', 'Philippines'),
('PITC', 'PN', 'Iles Pitcairn', 'Pitcairn Island'),
('POLO', 'PL', 'Pologne', 'Poland'),
('POLY', 'PF', 'Polynésie française', 'French Polynesia'),
('PORT', 'PT', 'Portugal', 'Portugal'),
('QATA', 'QA', 'Qatar', 'Qatar'),
('REUN', 'RE', 'Réunion', 'Reunion'),
('RICA', 'CR', 'Costa Rica', 'Costa Rica'),
('RICO', 'PR', 'Porto Rico', 'Puerto Rico'),
('ROUM', 'RO', 'Roumanie', 'Romania'),
('RUSS', 'RU', 'Russie', 'Russia (Russian Federation)'),
('RWAN', 'RW', 'Rwanda', 'Rwanda'),
('SAHA', 'EH', 'Sahara occidental', 'Western Sahara'),
('SALO', 'SB', 'Iles Salomon', 'Solomon Islands'),
('SALV', 'SV', 'Salvador', 'El Salvador'),
('SAMA', 'AS', 'Samoa américaines', 'American Samoa'),
('SAMO', 'WS', 'Samoa', 'Samoa'),
('SENE', 'SN', 'Sénégal', 'Senegal'),
('SEYC', 'SC', 'Seychelles', 'Seychelles'),
('SING', 'SG', 'Singapour', 'Singapore'),
('SLN_', 'SH', 'Sainte-Hélène', 'Saint Helena'),
('SLOQ', 'SK', 'Slovaquie', 'Slovakia'),
('SLOV', 'SI', 'Slovénie', 'Slovenia'),
('SLUC', 'LC', 'Sainte-Lucie', 'Saint Lucia'),
('SMAR', 'SM', 'Saint-Marin', 'San Marino'),
('SOMA', 'SO', 'Somalie', 'Somalia'),
('SOUD', 'SD', 'Soudan', 'Sudan'),
('SPIE', 'PM', 'Saint-Pierre-et-Miquelon', 'Saint Pierre and Miquelon'),
('SRIL', 'LK', 'Sri Lanka', 'Sri Lanka (ex-Ceilan)'),
('SSIE', 'VA', 'Saint-Siège ', 'Vatican City State (Holy See)'),
('SUED', 'SE', 'Suède', 'Sweden'),
('SUIS', 'CH', 'Suisse', 'Switzerland'),
('SURI', 'SR', 'Suriname', 'Suriname'),
('SVAL', 'SJ', 'Iles Svalbard et Jan Mayen', 'Svalbard and Jan Mayen Islands'),
('SVIN', 'VC', 'Saint-Vincent-et-les-Grenadines', 'Saint Vincent and the Grenadines'),
('SWAZ', 'SZ', 'Swaziland', 'Swaziland'),
('SYRY', 'SY', 'Syrie', 'Syrian Arab Republic'),
('TADJ', 'TJ', 'Tadjikistan', 'Tajikistan'),
('TAIW', 'TW', 'Taïwan', 'Taiwan'),
('TANZ', 'TZ', 'Tanzanie', 'Tanzania, United Republic of'),
('TCHA', 'TD', 'Tchad', 'Chad'),
('TCHE', 'CZ', 'République tchèque', 'Czech Republic'),
('TERR', 'TF', 'Terres australes françaises', 'French Southern Territories - TF'),
('THAI', 'TH', 'Thaïlande', 'Thailand'),
('TIMO', 'TL', 'Timor Oriental', 'Timor-Leste (East Timor)'),
('TOBA', 'TT', 'Trinité-et-Tobago', 'Trinidad & Tobago'),
('TOGO', 'TG', 'Togo', 'Togo'),
('TOKE', 'TK', 'Tokélaou', 'Tokelau'),
('TOME', 'ST', 'Sao Tomé-et-Principe', 'Sao Tome and Principe'),
('TONG', 'TO', 'Tonga', 'Tonga'),
('TUNI', 'TN', 'Tunisie', 'Tunisia'),
('TUR1', 'TC', 'Iles Turks-et-Caicos', 'Turks and Caicos Islands'),
('TUR2', 'TM', 'Turkménistan', 'Turkmenistan'),
('TURQ', 'TR', 'Turquie', 'Turkey'),
('TUVA', 'TV', 'Tuvalu', 'Tuvalu'),
('UKRA', 'UA', 'Ukraine', 'Ukraine'),
('URUG', 'UY', 'Uruguay', 'Uruguay'),
('USA_', 'US', 'États-Unis', 'United States'),
('VANU', 'VU', 'Vanuatu', 'Vanuatu'),
('VENE', 'VE', 'Venezuela', 'Venezuela'),
('VIEA', 'VI', 'Iles Vierges américaines', 'Virgin Islands, U.S.'),
('VIEB', 'VG', 'Iles Vierges britanniques', 'Virgin Islands, British'),
('VIET', 'VN', 'Viêt Nam', 'Viet Nam'),
('WALI', 'WF', 'Wallis-et-Futuna', 'Wallis and Futuna'),
('YEME', 'YE', 'Yémen', 'Yemen'),
('YOUG', 'YU', 'Yougoslavie', 'Saint Pierre and Miquelon'),
('ZAMB', 'ZM', 'Zambie', 'Zambia'),
('ZIMB', 'ZW', 'Zimbabwe', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `idStat` int(5) NOT NULL AUTO_INCREMENT,
  `libStat` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idStat`),
  KEY `STATUT_FK` (`idStat`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`idStat`, `libStat`) VALUES
(1, 'Membre niveau 1'),
(2, 'Modérateur niveau 1'),
(3, 'Membre niveau 2'),
(4, 'Modérateur niveau 2'),
(5, 'Administrateur'),
(6, 'Superviseur niveau 1'),
(7, 'Superviseur niveau 2'),
(8, 'Autre'),
(9, 'Super Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `thematique`
--

DROP TABLE IF EXISTS `thematique`;
CREATE TABLE IF NOT EXISTS `thematique` (
  `numThem` char(8) NOT NULL,
  `libThem` char(60) DEFAULT NULL,
  `numLang` char(8) NOT NULL,
  PRIMARY KEY (`numThem`),
  KEY `THEMATIQUE_FK` (`numThem`),
  KEY `FK_ASSOCIATION_4` (`numLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `thematique`
--

INSERT INTO `thematique` (`numThem`, `libThem`, `numLang`) VALUES
('THE0101', 'L\'événement', 'FRAN01'),
('THE0102', 'L\'acteur-clé', 'FRAN01'),
('THE0103', 'Le mouvement émergeant', 'FRAN01'),
('THE0104', 'L\'insolite / le clin d\'oeil', 'FRAN01'),
('THE0201', 'The event', 'ANGL01'),
('THE0202', 'The key player', 'ANGL01'),
('THE0203', 'The emerging movement', 'ANGL01'),
('THE0204', 'The unusual / the wink', 'ANGL01'),
('THE0301', 'Die Veranstaltung', 'ALLE01'),
('THE0302', 'Der Schlüsselakteur', 'ALLE01'),
('THE0303', 'Die entstehende Bewegung', 'ALLE01'),
('THE0304', 'Das Ungewöhnliche / das Augenzwinkern', 'ALLE01');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `pseudoUser` char(60) NOT NULL,
  `passUser` char(60) NOT NULL,
  `nomUser` char(60) DEFAULT NULL,
  `prenomUser` char(60) DEFAULT NULL,
  `eMailUser` char(70) NOT NULL,
  `idStat` int(5) NOT NULL,
  PRIMARY KEY (`pseudoUser`,`passUser`),
  KEY `USER_FK` (`pseudoUser`,`passUser`),
  KEY `FK_ASSOCIATION_6` (`idStat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`pseudoUser`, `passUser`, `nomUser`, `prenomUser`, `eMailUser`, `idStat`) VALUES
('admin', 'admin', 'Starr', 'Joe', 'JoeStarr@free.fr', 9),
('BarbieS9', 'P9#7xL', 'La Rousselle', 'Juliessss', 'titou@gmail.com', 2),
('Chris45', 'Ut!D5?h0', 'Dupontmarant', 'Jeancricri', 'cricri@srf.fr', 7),
('Cruella', 'qL:5R!1', 'Mercury', 'Freddy', 'Cruella@free.fr', 5);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `angle`
--
ALTER TABLE `angle`
  ADD CONSTRAINT `FK_ASSOCIATION_3` FOREIGN KEY (`numLang`) REFERENCES `langue` (`numLang`);

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_ASSOCIATION_1` FOREIGN KEY (`numAngl`) REFERENCES `angle` (`numAngl`),
  ADD CONSTRAINT `FK_ASSOCIATION_2` FOREIGN KEY (`numThem`) REFERENCES `thematique` (`numThem`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_ASSOCIATION_8` FOREIGN KEY (`numArt`) REFERENCES `article` (`numArt`),
  ADD CONSTRAINT `FK_ASSOCIATION_9` FOREIGN KEY (`numMemb`) REFERENCES `membre` (`numMemb`);

--
-- Contraintes pour la table `commentplus`
--
ALTER TABLE `commentplus`
  ADD CONSTRAINT `FK_COMMENTPLUS` FOREIGN KEY (`numSeqComR`,`numArtR`) REFERENCES `comment` (`numSeqCom`, `numArt`),
  ADD CONSTRAINT `FK_COMMENTPLUS2` FOREIGN KEY (`numSeqCom`,`numArt`) REFERENCES `comment` (`numSeqCom`, `numArt`);

--
-- Contraintes pour la table `langue`
--
ALTER TABLE `langue`
  ADD CONSTRAINT `FK_ASSOCIATION_7` FOREIGN KEY (`numPays`) REFERENCES `pays` (`numPays`);

--
-- Contraintes pour la table `likeart`
--
ALTER TABLE `likeart`
  ADD CONSTRAINT `FK_LIKEART` FOREIGN KEY (`numArt`) REFERENCES `article` (`numArt`),
  ADD CONSTRAINT `FK_LIKEART2` FOREIGN KEY (`numMemb`) REFERENCES `membre` (`numMemb`);

--
-- Contraintes pour la table `likecom`
--
ALTER TABLE `likecom`
  ADD CONSTRAINT `FK_LIKECOM` FOREIGN KEY (`numSeqCom`,`numArt`) REFERENCES `comment` (`numSeqCom`, `numArt`),
  ADD CONSTRAINT `FK_LIKECOM2` FOREIGN KEY (`numMemb`) REFERENCES `membre` (`numMemb`);

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `FK_ASSOCIATION_10` FOREIGN KEY (`idStat`) REFERENCES `statut` (`idStat`);

--
-- Contraintes pour la table `motcle`
--
ALTER TABLE `motcle`
  ADD CONSTRAINT `FK_ASSOCIATION_5` FOREIGN KEY (`numLang`) REFERENCES `langue` (`numLang`);

--
-- Contraintes pour la table `motclearticle`
--
ALTER TABLE `motclearticle`
  ADD CONSTRAINT `FK_MotCleArt1` FOREIGN KEY (`numMotCle`) REFERENCES `motcle` (`numMotCle`),
  ADD CONSTRAINT `FK_MotCleArt2` FOREIGN KEY (`numArt`) REFERENCES `article` (`numArt`);

--
-- Contraintes pour la table `thematique`
--
ALTER TABLE `thematique`
  ADD CONSTRAINT `FK_ASSOCIATION_4` FOREIGN KEY (`numLang`) REFERENCES `langue` (`numLang`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_ASSOCIATION_6` FOREIGN KEY (`idStat`) REFERENCES `statut` (`idStat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
