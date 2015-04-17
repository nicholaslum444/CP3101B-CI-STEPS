INSERT INTO `STEPSiteration` (`iteration`,`semester`) VALUES (7,'1415/2');

INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES 
('simkhechai','Prof. Sim Khe Chai','simkhechai@nus.edu.sg',12345678,2,1),
('tuanqphan','Prof. Tuan Q. Phan','tuanqphan@nus.edu.sg',12345678,2,1),
('ngteckkhim','Prof. Ng Teck Khim','ngteckkhim@nus.edu.sg',12345678,2,1),
('bimlesh','Dr. Bimlesh Wadhwa','bimlesh@nus.edu.sg',12345678,2,1),
('anandbhojan','Dr. Bhojan Anand','anandbhojan@nus.edu.sg',12345678,2,1),
('leowweekheng','Prof. Leow Wee-Kheng','leowweekheng@nus.edu.sg',12345678,2,1),
('terrencesim','Prof. Terrence SIM','terrencesim@nus.edu.sg',12345678,2,1),
('tanchewlim','Prof. Tan Chew Lim','tanchewlim@nus.edu.sg',12345678,2,1),
('ooiweitsang','Prof. Ooi wei Tsang','ooiweitsang@nus.edu.sg',12345678,2,1),
('stevenha','Dr. Steven Halim','stevenha@nus.edu.sg',12345678,2,1);

INSERT INTO `module` (`module_code`,`iteration`,`module_name`,`module_description`,`class_size`,`module_id`) VALUES
('IS5126',6,'Hands-On With Business Analytics','Business Analytics is the growing, inter-disciplinary field of bringing data to build business insights and support decisions. The goal of the course is to bridge the divide between technical skills and business know-how. Through learning-by-doing, students will engage in a series of business case study discussions, guided group projects, and a final semester project of their own design. Lectures will cover practical skills using the latest tools and techniques, as well as discuss business cases and applications. The module will give students practice in the data funnel from gathering and collecting data, extraction-transformation-loading, analysis, and interpretation. Applications will cover areas such as retailing, customer relationship management (CRM), social media, and marketing.',54,'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy'),
('CS3217',6,'Software Engineering on Modern Application Platforms','Students will learn about the essential Software Engineering (SE) principles and develop their SE skills by writing mobile apps for the iOS platform. During the second half of the semester, students will work in teams of not more than 4 students to develop cool and innovative iOS apps. Students can pretty much develop whatever apps that they desire as long as it is not immoral and does not compromise learning values. Visit our FaceBook page on https://www.facebook.com/cs3217 to find out more about the apps that were created by past students from CS3217.',41,'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx'),
('CS3218',6,'Multimodal Processing in Mobile Platforms','Modern mobile platforms such as smart phones and tablets are equipped with an increasing number of sensing modalities. In addition to traditional components such as keyboards and touch screens, they are also equipped with cameras, microphones, inertial sensor, and GPS receivers. With these modalities all packed into a single platform, it is important to empower application developers with basic knowledge and practical skills in dealing with these modalities. This module introduces the students to basic theories, concept and practical skills needed in input, processing and output of multimodal data on mobile platforms.', 18,'qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq'),
('CS3240',6,'Interaction Design','CS3240 Interaction Design is intended for students in computing and related disciplines whose work focuses on human-computer interaction issues in the design of computer systems. The course stresses the importance of user-centered design and usability in the development of computer applications and systems. Students are taken through the analysis, design, development, and evaluation of human-computer interaction methods for computer systems. They acquire hands-on design skills through laboratory exercises and assignments. The course covers HCI design principles and emphasizes the importance of contextual, organizational, and social factors in interaction design.',52,'pppppppp-pppp-pppp-pppp-pppppppppppp'),
('CS3247',6,'Game Development','The objective of CS3247 Game Development module is to introduce techniques for electronic game design and programming. This module covers a range of important topics including 3D maths, game physics, game AI, sound, as well as user interface for computer games. Furthermore, it will give an overview of computer game design, publishing and marketting to the students. Through laboratory projects, the students will have hands-on programming experience with popular game engines and will develop basic games using those engine. Module Theme: Design to Market. Expected Outcome: After completing the course students will be able to create Games Independently (Indie Game Developers - individual or a small team) as well as work in a team of large Game projects/studios.',50,'oooooooo-oooo-oooo-oooo-oooooooooooo'),
('CS3284',6,'Media Technology Project II','This module is the second part of a two-part series on the development of media technology systems such as interactive systems, games, retrieval systems, multimedia computing applications, etc. Students will form project teams to work on media technology projects. This second part focuses on the development of algorithms required for the systems, implementation and testing of the algorithms and the systems, and evaluation of the systems according to the users requirements.',	45,'tttttttt-tttt-tttt-tttt-tttttttttttt'),
('CS4244',6,'Knowledge-Based Systems','This is a module that contains both the theory and practice of building knowledge-based systems. The aim of this module is to prepare students so that they can design and build knowledge-based systems to solve real-world problems. The module starts with motivations, background and history of knowledge-based system development. The main content has five parts: rule-based programming language, uncertainty management, knowledge-based systems design, development and life cycle, efficiency in rule-based language and knowledge-based systems design examples.',18,'rrrrrrrr-rrrr-rrrr-rrrr-rrrrrrrrrrrr'),
('CS4344',6,'Networked and Mobile Gaming','This module aims at providing students with a deep understanding of various technical issues pertaining to the development of networked games and mobile games. Students will be exposed to concepts from distributed system, operating systems, security and cryptography, networking and embedded systems. In particular, issues such as game server architectures (mirrored, centralized, peer-to-peer etc.), consistency management (bucket synchronization, dead reckoning etc.), interest management, scalability to large number of clients, cheat prevention and detection, and power management will be discussed.',35,'kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk'),
('CP3101B',6,'Web programming and Applications','This module is offered as part of the CP3101 Topics in Computing series. It introduces software development on the web. Topics include networking, clients and servers, HTTP protocol and HTML5 localStorage, HTML5 forms, CSS, dynamically served pages using PHP, DOM, Object Oriented Javascript and jQuery, and combining Javascript and PHP to build an AJAX web application. We will also investigate the use of Javascript, HTML5 canvas, sensor API and mobile platform to build responsive mobile. Some advanced topics may be discussed such as web security and how to generate traffic to your web application.',58,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');

INSERT INTO `supervise` (`user_id`,`module_id`) VALUES
('tuanqphan','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx'),
('simkhechai','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy'),
('ngteckkhim','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq'),
('bimlesh','pppppppp-pppp-pppp-pppp-pppppppppppp'),
('anandbhojan','oooooooo-oooo-oooo-oooo-oooooooooooo'),
('leowweekheng','tttttttt-tttt-tttt-tttt-tttttttttttt'),
('terrencesim','rrrrrrrr-rrrr-rrrr-rrrr-rrrrrrrrrrrr'),
('tanchewlim','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk'),
('ooiweitsang','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk'),
('stevenha','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');

INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('FATAL ERROR  ',5000,'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx','A combination of singing games and endless running game that allows users to control running character窶冱 movement by singing (pitch of sound).','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000001B','HUANG WEILONG','a@nus.edu.sg',60000000,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000001B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000001B','5000');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000002B',' LUO SHAOHUAI','a@nus.edu.sg',60000001,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000002B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000002B','5000');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000003B',' XU CHEN','a@nus.edu.sg',60000002,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000003B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000003B','5000');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Planck ',5001,'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx','Planck is a famous physicist and musician and Planck is a music-physics game to give you both sensory and mind enjoyment. Lights can be reflected, refracted, mixed and dispersed, and what you need to do is to put the optical devices in the right position. Then the light rays of different colors will travel in different path, towards different destination and finally give you a master piece of melody.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000004B','JIANG SHENG','a@nus.edu.sg',60000003,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000004B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000004B','5001');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000005B',' LEI MINGYU','a@nus.edu.sg',60000004,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000005B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000005B','5001');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000006B',' WANG JINGHAN ','a@nus.edu.sg',60000005,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000006B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000006B','5001');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('窶泥ash- ',5002,'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx','Rhythm runner game with procedurally generated levels using personal music libraries on the iPhone. The player will have to jump over and duck under obstacles, and collect notes to earn points and progress in the game. These obstacles and notes will match the background music that the player select. Players compete on a online leaderboard for bragging rights.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000007B','CAO SHENGZE','a@nus.edu.sg',60000006,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000007B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000007B','5002');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000008B',' CHEAH KIT WENG','a@nus.edu.sg',60000007,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000008B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000008B','5002');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000009B',' ELIAS REDA BOUTALEB','a@nus.edu.sg',60000008,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000009B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000009B','5002');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000010B',' MUHAMMAD FAZLI B SAPUAN ','a@nus.edu.sg',60000009,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000010B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000010B','5002');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Pacman Reloaded ',5003,'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx','The recent decades have seen explosions in two categories of games: some use their easy-to-comprehend yet creative game ideas to attract new users, whereas many others went on the other extreme. Pacman Reloaded is an iPad game that tries to integrate both the simplistic and the complex approaches. It is going to bring the old game onto another stage, taking advantage of the modern Internet and the iPad platform to support online, multiplayer version of the classic game.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000011B','CHEN MINQI','a@nus.edu.sg',60000010,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000011B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000011B','5003');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000012B',' PAN LONG','a@nus.edu.sg',60000011,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000012B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000012B','5003');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000013B',' SU XUAN','a@nus.edu.sg',60000012,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000013B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000013B','5003');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000014B',' ZHOU CHUYU ','a@nus.edu.sg',60000013,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000014B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000014B','5003');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('MahjongLeh! ',5004,'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx','MahjongLeh! is a 4-player, multi device, mahjong game that works on the iPhone and the iPad. The game follows the Singapore窶冱 twist on the popular table game. Compared to the other variations of Mahjong around the world, in Singapore Mahjong, we have an additional four animal tiles (mouse, cockerel, cat, and the centipede). Also, Singapore Mahjong has an alternative scoring system and winning criteria.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000015B','ANG MING YI (HONG MINGYI)','a@nus.edu.sg',60000014,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000015B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000015B','5004');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000016B',' CHEN JINGWEN','a@nus.edu.sg',60000015,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000016B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000016B','5004');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000017B',' TAN KAI MENG WILSON','a@nus.edu.sg',60000016,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000017B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000017B','5004');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000018B',' YEO QUAN YANG ','a@nus.edu.sg',60000017,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000018B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000018B','5004');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('LifeQuest ',5005,'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx','Lifestyle and productivity apps are a-plenty, but its difficult to make it a habit to use them unless the user has the innate motivation to do so. LifeQuest helps the user to keep track of goals, tasks and habit-forming activities by creating an in-depth, gamified tracking and analysis system to create an additional incentive for users to keep coming back to further enrich their lives. LifeQuest helps users to help themselves, and also makes the process fun!.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000019B','HO TACK KIAN','a@nus.edu.sg',60000018,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000019B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000019B','5005');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000020B',' TRUONG VIET TRUNG','a@nus.edu.sg',60000019,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000020B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000020B','5005');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000021B',' WANG GAOXIANG ','a@nus.edu.sg',60000020,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000021B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000021B','5005');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('BioLifeTracker  ',5006,'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx','BioLifeTracker is an iOS application that provides a clean, simple and smart interface for Animal Behavior students to collect and analyse their research data. It is a smart application that intuitively guides the users to do their research and provides interactive visual analysis aids to help users see research trends.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000022B','ANDHIEKA PUTRA','a@nus.edu.sg',60000021,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000022B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000022B','5006');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000023B',' HARITHA RAMESH','a@nus.edu.sg',60000022,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000023B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000023B','5006');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000024B',' LI JIA EN NICHOLETTE','a@nus.edu.sg',60000023,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000024B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000024B','5006');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000025B',' TAN JIA MIN MICHELLE','a@nus.edu.sg',60000024,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000025B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000025B','5006');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Memento ',5007,'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx','Create memory palaces to aid users to use the technique of association to remember/memorise content. Memory palaces are a way to remember content with association with visual images and places, and we aim to allow users to easily create these routes of images. Users can use their mobile device camera to aid them in their creations, as well as share their creations with their peers.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000026B','ABDULLA ASLAM CONTRACTOR','a@nus.edu.sg',60000025,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000026B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000026B','5007');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000027B',' CHEE WAI HON','a@nus.edu.sg',60000026,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000027B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000027B','5007');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000028B',' LIM JING RONG','a@nus.edu.sg',60000027,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000028B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000028B','5007');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000029B',' QUA ZI XIAN ','a@nus.edu.sg',60000028,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000029B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000029B','5007');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Cattle Battle ',5008,'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx','A funny battle between 2 farms, each farm will use their cute cattle to defend against enemys attacks. Player can also use cattle to attack back. Different cattle will have different strength and speed. Player can wisely strategize their choice to win. Furthermore, some superb animals with special power may appear randomly to your farm and help you in the battle. Are you ready to protect your farm?','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000030B','DING MING','a@nus.edu.sg',60000029,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000030B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000030B','5008');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000031B',' DUONG THANH DAT','a@nus.edu.sg',60000030,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000031B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000031B','5008');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000032B',' NGUYEN VIET DUNG','a@nus.edu.sg',60000031,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000032B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000032B','5008');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000033B',' TRAN CONG THIEN','a@nus.edu.sg',60000032,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000033B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000033B','5008');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Cattac ',5009,'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx','Cattac is a casual and cute cat-themed iOS turn based game, where each player plan their action for the next turn simultaneously. All actions are then executed simultaneously. Gameplay will be on a grid that is square. The grid will be populated with nodes and have a randomly generated level (randomised doodads, events, items e.t.c. on each node) each time the game is played. This ensures that the game does not get stale even with multiple playthroughs with other cats.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000034B','KHONG WAI HOW STEVEN','a@nus.edu.sg',60000033,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000034B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000034B','5009');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000035B',' WU DI','a@nus.edu.sg',60000034,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000035B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000035B','5009');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000036B',' YAP JUN HAO ','a@nus.edu.sg',60000035,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000036B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000036B','5009');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('CrossFeed ',5010,'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx','CrossFeed supercharges your knowledge of current affairs with bite-sized headlines in a fun and engaging manner. Designed to fit the lifestyle of daily commuters, CrossFeed aggregates news based on your interests and present it in your very own crossword-like puzzle. With story mode, time trials and zen mode, it caters to the adventurous, fun-seeking players and avid readers. What窶冱 more, you can even play it with friends!','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000037B','HAN EN CHOU','a@nus.edu.sg',60000036,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000037B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000037B','5010');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000038B',' LIN XUANYI','a@nus.edu.sg',60000037,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000038B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000038B','5010');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000039B',' SUE ZHENG HAO','a@nus.edu.sg',60000038,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000039B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000039B','5010');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000040B',' SUN WANG JUN ','a@nus.edu.sg',60000039,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000040B','xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000040B','5010');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Guitar Chord Translator ',5011,'qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq','Songs and music today is easily accessible online, and viewed and enjoyed on sites like youtube and dailymotion, through music videos. The ease of exhibiting one窶冱 own videos have led to many music enthusiasts filming their own version of popular songs played on their personal guitar, with the addition of their own flavor of music through unique preludes, endings, intermediate chords etc. Many of these chords are not easily found online, which poses inconvenience to guitar enthusiasts inspired by these videos and want to learn to play these versions. Hence our android app seeks to be able to record the music played from music videos on youtube, through the phone窶冱 microphone, and generate the appropriate guitar chords for the user, so that he/she can recreate the song on their own guitar. This app will thus aid the guitar enthusiasts in improving his/her ease of access to guitar scores of various song versions.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000041B','Lee Chi Cheng Daniel','a@nus.edu.sg',60000040,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000041B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000041B','5011');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000042B',' Sotherith Sreang','a@nus.edu.sg',60000041,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000042B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000042B','5011');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000043B',' Leong Wei Jian ','a@nus.edu.sg',60000042,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000043B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000043B','5011');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Let窶冱 Paint ',5012,'qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq','Targeted for kids, 窶廰et窶冱 Paint窶� is an application that will help kids develop their artistic skills. Basically, the app can take photos of people, animal or everyday objects and turn them into coloring pages. The kids, then can color them using the build-in tools and unleash their creativity. With this app, there is no need to worry about running out of coloring books or pen.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000044B','Wai Min','a@nus.edu.sg',60000043,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000044B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000044B','5012');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000045B',' Paing Zin Oo','a@nus.edu.sg',60000044,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000045B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000045B','5012');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000046B',' Khin Wa Than Aye ','a@nus.edu.sg',60000045,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000046B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000046B','5012');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Photopix Photo Editor ',5013,'qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq','Photopix is an android photo editing application as well as a photo collage-maker. Photos can be enhanced by using a wide variety of effects, color filters and frames in a quick and easy way, and then formed into photo collages. Moreover, with Photopix, in-app navigation and controlling is not limited to touch gestures only. Making use of motion sensors, tilting the phone also makes another convenient way to have fun with the navigation in the app.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000047B','Moe Lwin Hein','a@nus.edu.sg',60000046,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000047B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000047B','5013');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000048B',' Lin XiuQing','a@nus.edu.sg',60000047,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000048B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000048B','5013');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000049B',' Luo ShaoHuai ','a@nus.edu.sg',60000048,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000049B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000049B','5013');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Taptask ',5014,'qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq','Need to execute a task discreetly on your smartphone where it窶冱 not so convenient? Or do you simply want shortcuts to automate everyday tasks? Get Taptask, an Android app that allows you to perform custom tasks or shortcuts by tapping anywhere on your phone. It runs silently in the background to detect your commands, even when your phone is not active. For example, you can decline an incoming call and send a customised SMS to the caller, speed dial your mom, or run any app, all with a sequence of taps that you define!','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000050B','Zhang Yiwen','a@nus.edu.sg',60000049,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000050B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000050B','5014');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000051B',' Chng Xinni','a@nus.edu.sg',60000050,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000051B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000051B','5014');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000052B',' Low WeiLin ','a@nus.edu.sg',60000051,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000052B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000052B','5014');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('GIXWall ',5015,'qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq','In this project we aim to develop an application, which leverages on the use of the camera on the mobile phone. It will allow a user to preview the design of his room by allowing the user to change the color of the wall by tapping the wall. This will help the potential user to preview the different color schemes he or she desire for his interior design. Not only that our app aims to provide approximation of measurements from wall to wall to facilitate the users in choosing potential furniture. This app aims to improve a normal user experience in the interior design of their home.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000053B','Chan Hou Cheng','a@nus.edu.sg',60000052,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000053B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000053B','5015');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000054B',' Eugene','a@nus.edu.sg',60000053,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000054B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000054B','5015');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000055B',' Tang Tim Ka ','a@nus.edu.sg',60000054,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000055B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000055B','5015');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Midify ',5016,'qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq','Problem: Transcribing audio from an instrument to MIDI for playback and synthesis (in post-processing or real-time). How our project solve this problem: Our Android application will allow user to record any audio source and convert it into a MIDI file output by analyzing different properties of the audio input such as pitch, duration of notes, etc. User can then use these MIDI files to playback on their mobile device or transfer them to other MIDI controllers. What makes our application unique is its portability where user can create MIDI tracks on the fly everywhere, which is not ideal for other MIDI controllers.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000056B','Bui Trong Nhan','a@nus.edu.sg',60000055,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000056B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000056B','5016');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000057B',' Ajay Raghav Karpur','a@nus.edu.sg',60000056,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000057B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000057B','5016');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000058B',' Iain Meeke ','a@nus.edu.sg',60000057,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000058B','qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000058B','5016');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Clyde VR - Liberating Exercise Bikes ',5017,'pppppppp-pppp-pppp-pppp-pppppppppppp','http://freethewheels.wordpress.com. Exercise bicycles are boring and there has never been a truly fun and engaging user experience. Clyde VR is offering a novel user experience in riding exercise bicycles through Virtual Reality. The stereoscopic headmount gives you a full 360ﾂｰ viewing experience as if you are cycling on the street; and the Anklet tracks your performance such as the distance traveled and calories burned, displayed right in front of your eyes as you pedal. With Clyde VR, you can also connect with your friends and compete your way to new locations around the world. We liberate exercise bicycles.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000059B','Ajie Nayaka Nikicio Denny','a@nus.edu.sg',60000058,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000059B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000059B','5017');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000060B',' Leonardo Sjahputra','a@nus.edu.sg',60000059,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000060B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000060B','5017');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000061B',' Michael Messell','a@nus.edu.sg',60000060,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000061B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000061B','5017');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000062B',' Tong Mingshuo ','a@nus.edu.sg',60000061,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000062B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000062B','5017');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Self-Checkout Machines ',5018,'pppppppp-pppp-pppp-pppp-pppppppppppp','Despite the existence of self-checkout machines in supermarkets, not many people use them. Instead, they still prefer using the traditional method of payment through the cashiers. The self-checkout machines currently fail to attain their purpose of reducing long queues and reducing manpower. Hence, we aim to explore this problem in greater depth and propose a solution.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000063B','Dao En','a@nus.edu.sg',60000062,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000063B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000063B','5018');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000064B',' Payal Amarnani','a@nus.edu.sg',60000063,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000064B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000064B','5018');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000065B',' Viraj Khuthia','a@nus.edu.sg',60000064,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000065B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000065B','5018');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000066B',' Nguyen Uyen ','a@nus.edu.sg',60000065,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000066B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000066B','5018');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('VivoDirect ',5019,'pppppppp-pppp-pppp-pppp-pppppppppppp','VivoDirect aims to enhance and provide an alternative to the current mall directory board of VivoCity in terms of accessibility and comprehensiveness. Instead of looking for a physical directory board, only to find a crowd or get lost, users can simply connect to the VivoCity Wi-Fi using their mobile phone, and they will be presented the landing page of the directory. It provides the users with efficient ways to search for a store, navigate in VivoCity, and view ongoing and upcoming promotions. Overall, its purpose is to help users save time and have a better shopping experience.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000067B','HOU LIWEN','a@nus.edu.sg',60000066,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000067B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000067B','5019');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000068B',' LI QINGXI','a@nus.edu.sg',60000067,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000068B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000068B','5019');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000069B',' LIN YU TING','a@nus.edu.sg',60000068,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000069B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000069B','5019');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000070B',' TAN JYE HOW JONATHAN','a@nus.edu.sg',60000069,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000070B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000070B','5019');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000071B',' DINH HOANG PHUONG UYEN ','a@nus.edu.sg',60000070,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000071B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000071B','5019');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('TBC',5020,'pppppppp-pppp-pppp-pppp-pppppppppppp','TBC CS3240','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('TagTime: An Interactive Timer and Stopwatch User Interface utilizing Near Field Communication(NFC) Tags. ',5021,'pppppppp-pppp-pppp-pppp-pppppppppppp','Current timers and stopwatches in our society do have certain disadvantages when using them. For integrated timers in smartphones, a pertinent problem is that it requires many steps to locate and activate the timer within the phone窶冱 vast array of applications. External timers/stopwatches are significantly easier to operate, but are not always as accessible as stopwatches/timers inside the phone as one it requires an additional accessory to be carried them around. In general, both groups of timers and stopwatches also lack the ability to concurrently start multiple timers and stopwatches, and also are generally unable to identify in detail what each timer/stopwatch is used for. Thus this project seems to improve the user窶冱 experience of using a timer and stopwatch function by making it easier and more accessible for the user to activate the timer/stopwatch on a smartphone through reducing button presses, while ensuring better capabilities.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000072B','HOANG THE HUAN','a@nus.edu.sg',60000071,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000072B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000072B','5021');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000073B',' LIM WANCAI DARYL','a@nus.edu.sg',60000072,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000073B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000073B','5021');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000074B',' NG WENBIN REICO MAYNARD','a@nus.edu.sg',60000073,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000074B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000074B','5021');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000075B',' QIU YUNHAN ','a@nus.edu.sg',60000074,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000075B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000075B','5021');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Subber ',5022,'pppppppp-pppp-pppp-pppp-pppppppppppp','A mobile application for supper goers to organise supper with their friends, find out how to travel to the supper location, allow them to book a bus service to transport them to their desired location, and also to fetch them home.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000076B','ANG HWEE LIN','a@nus.edu.sg',60000075,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000076B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000076B','5022');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000077B',' CHONG JIA','a@nus.edu.sg',60000076,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000077B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000077B','5022');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000078B',' WEI JOEL NG','a@nus.edu.sg',60000077,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000078B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000078B','5022');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000079B',' RAYMOND CHENG ','a@nus.edu.sg',60000078,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000079B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000079B','5022');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('TBC',5023,'pppppppp-pppp-pppp-pppp-pppppppppppp','TBC CS3240','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('NUSSUP ',5024,'pppppppp-pppp-pppp-pppp-pppppppppppp','We observe that NUS students currently do not have a centralised platform for them to find out about school events in a systematic manner. The main student portal - IVLE and other channels such as email blast and notice boards only provide information in a uncategorised manner, which does not help students who would like to search for activities and events that are of their own interest. We would thus like to explore and tackle this problem to come up with a platform for students to keep up with school event news more effectively. Our app targets NUS undergraduate students, especially year 1 and 2 students, who are rather unclear about various school information and school events as they are relatively newer to NUS. They are however more concerned about where and how to find details regarding student窶冱 organised events, since they generally have more time to participate, and are more in need of certain opportunities and activities to help them gain experience or interpersonal skills as an undergraduate student.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000080B','Nicholas Ooi Hsien Loong','a@nus.edu.sg',60000079,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000080B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000080B','5024');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000081B',' Nguyen Thanh Ha','a@nus.edu.sg',60000080,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000081B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000081B','5024');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000082B',' Lee Jianwei','a@nus.edu.sg',60000081,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000082B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000082B','5024');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000083B',' Neo Kian Hwee Edison','a@nus.edu.sg',60000082,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000083B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000083B','5024');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000084B',' Parag Bhatnagar ','a@nus.edu.sg',60000083,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000084B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000084B','5024');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('ModFeed ',5025,'pppppppp-pppp-pppp-pppp-pppppppppppp','We will be looking at improving the user experiences of IVLE workbin and announcements features by making it more intuitive and helpful for current and incoming students.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000085B','SUE ZHENG HAO','a@nus.edu.sg',60000084,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000085B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000085B','5025');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000086B',' HUANG WEI LING','a@nus.edu.sg',60000085,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000086B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000086B','5025');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000087B',' JOANNE MAH JIA WEN','a@nus.edu.sg',60000086,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000087B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000087B','5025');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000088B',' ZHANG QIN YUAN ','a@nus.edu.sg',60000087,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000088B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000088B','5025');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('TBC',5026,'pppppppp-pppp-pppp-pppp-pppppppppppp','TBC CS3240','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('iBUS- A travel app for NUS ',5027,'pppppppp-pppp-pppp-pppp-pppppppppppp','Everyday, commuters in NUS experience the pain of waiting for buses, looking at inaccurate bus arrival timings and are filled with uncertainty of whether the buses they are waiting for are too crowded to board.Thus, in this project, we hope to address this problem by creating an app called iBus, which will be a journey planner/tracker and a bus tracking app specifically for NUS.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000089B','CHUA HAO ENG','a@nus.edu.sg',60000088,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000089B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000089B','5027');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000090B',' JASON TEO BOON KUANG','a@nus.edu.sg',60000089,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000090B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000090B','5027');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000091B',' LIU YUANRUI','a@nus.edu.sg',60000090,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000091B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000091B','5027');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000092B',' TAMANA ANNA THARAKAN','a@nus.edu.sg',60000091,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000092B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000092B','5027');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000093B',' LI YIZHE','a@nus.edu.sg',60000092,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000093B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000093B','5027');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('OneNUS ',5028,'pppppppp-pppp-pppp-pppp-pppppppppppp','An unification of various NUS services into a mobile application.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000094B','Samuel Lim Yi Jie','a@nus.edu.sg',60000093,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000094B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000094B','5028');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000095B',' Bay Chuan Wei','a@nus.edu.sg',60000094,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000095B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000095B','5028');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000096B',' Tan Xiao Yan Joan','a@nus.edu.sg',60000095,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000096B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000096B','5028');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000097B',' Ng Soo Sian Amanda','a@nus.edu.sg',60000096,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000097B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000097B','5028');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000098B',' Aashvi Bana ','a@nus.edu.sg',60000097,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000098B','pppppppp-pppp-pppp-pppp-pppppppppppp');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000098B','5028');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Wormhole ',5029,'oooooooo-oooo-oooo-oooo-oooooooooooo','Year 3000: Earth is dying. A Wormhole appears. Desperate and with their final shard of optimism, the last of survivors go on a failed mission to find a way off their home planet. Now trapped, the security detail took their gear through the mysterious portal and entered a maze from another world. Only one man returned, his limb a sacrificial token to the abyss of a maze. You are the brave son/daughter of one of those lost to the maze. It is now up to you to fight zombies and find the maze exit, to a better place窶ｦ or not窶ｦ','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000099B','Andrew Andy Chng Chee Weng','a@nus.edu.sg',60000098,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000099B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000099B','5029');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000100B',' Chua Hao Eng','a@nus.edu.sg',60000099,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000100B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000100B','5029');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000101B',' Goh Hui May','a@nus.edu.sg',60000100,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000101B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000101B','5029');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000102B',' Yeap Si Rui','a@nus.edu.sg',60000101,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000102B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000102B','5029');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000103B',' Zhang Yiwen ','a@nus.edu.sg',60000102,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000103B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000103B','5029');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Dash! ',5030,'oooooooo-oooo-oooo-oooo-oooooooooooo','A girl is transported to a world where she must jump, dodge and hack her way to the goal according to the rhythm of the level. The levels are dynamically generated by running a music file through a series of Fourier transform and wave analysis algorithms and then pegging an obstacle to certain cues in the music. Players can choose to import their own music files into the game and generate a level from there to play with.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000104B','TAN Li Boon','a@nus.edu.sg',60000103,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000104B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000104B','5030');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000105B',' FAZLI Sapuan','a@nus.edu.sg',60000104,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000105B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000105B','5030');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000106B',' TAN Tack Poh','a@nus.edu.sg',60000105,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000106B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000106B','5030');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000107B',' TANG Huan Song','a@nus.edu.sg',60000106,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000107B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000107B','5030');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000108B',' Jenna TAY Xiu Li ','a@nus.edu.sg',60000107,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000108B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000108B','5030');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Illuminate ',5031,'oooooooo-oooo-oooo-oooo-oooooooooooo','These days horror game is becoming rare although there are notable ones. The project aims to make a horror game revolving around light. Player is required to exorcise demons using light which can be replenished at the price of losing light source like lamps around the building - thus vision. The project is compatible with Oculus Rift for those who would like more immersive experience.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000109B','Terence Rei Jie Then','a@nus.edu.sg',60000108,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000109B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000109B','5031');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000110B',' Hans Adrian','a@nus.edu.sg',60000109,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000110B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000110B','5031');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000111B',' Christopher Andy Weidya','a@nus.edu.sg',60000110,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000111B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000111B','5031');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000112B',' Ko Wan Ling','a@nus.edu.sg',60000111,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000112B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000112B','5031');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000113B',' Tan Zheng Jie Matthew ','a@nus.edu.sg',60000112,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000113B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000113B','5031');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Broken ',5032,'oooooooo-oooo-oooo-oooo-oooooooooooo','Broken is a third person action adventure game for PCs and consoles. The story revolves around a multi-millionaire who is deceitfully framed and lands up in a high-security prison. The player aids the protagonist in navigating a world filled with known and unknown dangers of a jail. Guide the protagonist through different parts of the prison as he uncovers the motives of the evil Warden. Engage yourself in an intense gameplay involving breath-taking fight sequences as he parkours his way past imminent death.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000114B','Akaash Gupta','a@nus.edu.sg',60000113,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000114B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000114B','5032');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000115B',' Aravindhan Duraisamy','a@nus.edu.sg',60000114,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000115B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000115B','5032');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000116B',' Shailen Aggarwal','a@nus.edu.sg',60000115,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000116B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000116B','5032');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000117B',' Ho Tack Kian ','a@nus.edu.sg',60000116,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000117B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000117B','5032');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Animal Revolt! ',5033,'oooooooo-oooo-oooo-oooo-oooooooooooo','Accused of false crimes. Exiled from the place you call home. These were the circumstances when you left everything behind. Having spent the past year on the run, you now hear of how dystopian your home has become. The time to run has ended. Your home needs you. Animal Farm needs you. In Animal Revolt!, you play as Snowball: revolutionary from the book Animal Farm. Restore peace and equality to the farm by using your bazooka. Load animals. Load tractors. Load walls. Anything can be ammunition. Use the environment wisely, because your enemies are smart enough to do the same.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000118B','Yong Jia Jie','a@nus.edu.sg',60000117,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000118B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000118B','5033');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000119B',' Kuek Kiang Kuang','a@nus.edu.sg',60000118,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000119B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000119B','5033');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000120B',' Chan Ao Wei Oswell','a@nus.edu.sg',60000119,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000120B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000120B','5033');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000121B',' Hsu Cheng Hsien ','a@nus.edu.sg',60000120,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000121B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000121B','5033');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Candy Run ',5034,'oooooooo-oooo-oooo-oooo-oooooooooooo','Two kids went out to look for food since they were left alone for too long by their parents. They came into a house made of candy and certainly they start enjoying the house. However the house is actually a trap set by an evil witch. She started chasing the two children with her evil tools. Can the children survive this fatal moment? Their destiny is in your hand! Start running and help them escape from the witch!','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000122B','Li Anbang','a@nus.edu.sg',60000121,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000122B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000122B','5034');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000123B',' Cao Shengze','a@nus.edu.sg',60000122,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000123B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000123B','5034');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000124B',' Wen Yiran','a@nus.edu.sg',60000123,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000124B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000124B','5034');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000125B',' Weng Yuan','a@nus.edu.sg',60000124,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000125B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000125B','5034');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000126B',' Zhang Xiang ','a@nus.edu.sg',60000125,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000126B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000126B','5034');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Power Racer - "Go Go Power" Racers! ',5035,'oooooooo-oooo-oooo-oooo-oooooooooooo','Power Racers is a light hearted multiplayer racing game that references elements from a third-person shooter game and a competitive arcade racing game. Goal of the game is to compete with your opponents to see who completes the race first. Players can choose to race with AIs or with other players through the online platform. The player can choose to play the game with MYO, Logitech Station Steering Wheel or with the very own keyboard on their desktops. 窶弃ower Racers窶� adopts a less serious approach with intended in-game art to appeal even to the age group of 7-12 years old.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000127B','Kevin Wong Jun Jie','a@nus.edu.sg',60000126,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000127B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000127B','5035');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000128B',' Lau Tze Hao Darren','a@nus.edu.sg',60000127,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000128B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000128B','5035');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000129B',' Weilson Tan','a@nus.edu.sg',60000128,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000129B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000129B','5035');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000130B',' Phan Shi Yu ','a@nus.edu.sg',60000129,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000130B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000130B','5035');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Myoro ',5036,'oooooooo-oooo-oooo-oooo-oooooooooooo','In this technology-driven age, where world has been attacked by worms and spywares. In order to save the world, our protagonist have to defeat the powerful V.I.R.U.S.(Vicious Insane Random Uncontrollable Subroutine). With the use of Myo Armband and VR HeadSet, the player will enter the world to annihilate the final boss and its minions with the use of spells and equipments through Myo Armband gestures. The goal of the game is to collect all the keys required to reach V.I.R.U.S, the final boss, and defeat it.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000131B','Sophia Yuen Shu Hui','a@nus.edu.sg',60000130,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000131B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000131B','5036');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000132B',' Stella Widyasari','a@nus.edu.sg',60000131,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000132B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000132B','5036');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000133B',' Camille Waligora','a@nus.edu.sg',60000132,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000133B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000133B','5036');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000134B',' Liu Jiale','a@nus.edu.sg',60000133,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000134B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000134B','5036');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000135B',' Maciej Ziarkowski ','a@nus.edu.sg',60000134,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000135B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000135B','5036');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Jack the Jetrider ',5037,'oooooooo-oooo-oooo-oooo-oooooooooooo','The evil Dr. Beanstalk kidnaps Jack after learning that he is a young prodigy and imprisons him. Jack is forced to make a device for Dr. Beanstalk so that he can take over the world! When Jack has finished the Jump Enhancing Taxi (aka J.E.T), instead of handing it over to the evil doctor, he decides to use it himself! Jack the Jetrider has to keep running to escape the grasp of Dr. Beanstalk! The way ahead is full of uncertainty. Will he break out and make his own legend?','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000136B','Chue Sai Hou','a@nus.edu.sg',60000135,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000136B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000136B','5037');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000137B',' Bui Trong Nhan','a@nus.edu.sg',60000136,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000137B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000137B','5037');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000138B',' Sivan Nanthiran','a@nus.edu.sg',60000137,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000138B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000138B','5037');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000139B',' Liu Yuanrui','a@nus.edu.sg',60000138,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000139B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000139B','5037');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000140B',' He Buwei ','a@nus.edu.sg',60000139,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000140B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000140B','5037');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('FREEZE ',5038,'oooooooo-oooo-oooo-oooo-oooooooooooo','Freeze is a first-person action-adventure game that is focused around being a virtual reality game (that will make use of the Oculus Rift). It is a level-based on-rails runner where the player automatically moves through a series of levels (with some lateral control) and has to dodge bullets being fired at him and also avoid other obstacles in the level. The core mechanic of the game is the player窶冱 ability to 窶彷reeze窶� or slow down time, allowing him to assess the situation around him and figure out the best way to navigate through the level.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000141B','Kang-An','a@nus.edu.sg',60000140,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000141B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000141B','5038');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000142B',' Ooh Jing','a@nus.edu.sg',60000141,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000142B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000142B','5038');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000143B',' Justin Doan','a@nus.edu.sg',60000142,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000143B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000143B','5038');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000144B',' Abel Tan ','a@nus.edu.sg',60000143,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000144B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000144B','5038');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Cat-astrophe! ',5039,'oooooooo-oooo-oooo-oooo-oooooooooooo','Cat-astrophe! is an immersive 3D action game, where you play as Nyan, a cute kitten, as he explores his environment and hunts for food. Play in Nyan窶冱 paws by mimicking his natural movements using the Leap Motion sensor, and see from his eyes with the Oculus Rift! Grow larger the more you eat, and soon you will be able to take on larger enemies and obstacles. An A-meow-zing adventure awaits!','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000145B','Qwek Siew Weng Melvyn','a@nus.edu.sg',60000144,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000145B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000145B','5039');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000146B',' Chng Xinni','a@nus.edu.sg',60000145,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000146B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000146B','5039');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000147B',' Lim Wancai Daryl','a@nus.edu.sg',60000146,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000147B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000147B','5039');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000148B',' Nguyen Trung Hieu ','a@nus.edu.sg',60000147,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000148B','oooooooo-oooo-oooo-oooo-oooooooooooo');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000148B','5039');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('CodeCraft ',5040,'tttttttt-tttt-tttt-tttt-tttttttttttt','CodeCraft is a web based visual programming Integrated Development Environment (IDE), inspired by SNAP!. It lets users program their own interactive and animated stories and games, by using drag-and-drop to combine blocks that each execute specific commands. It can be used as a teaching tool to introduce basic programming concepts to young children.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Interactive Human Anatomy ',5041,'tttttttt-tttt-tttt-tttt-tttttttttttt','The Interactive Human Anatomy Project aims to create an independent learning platform for the Department of Anatomy in the Yong Loo Lin School of Medicine. It will focus on the 3D interaction of human systems with text annotations as well as the display of videos and presentations/notes and support of MCQ self-assessment quizzes for students. In order to better organize the massive amount of content, course material will be separated into different lessons.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Animated History of the World ',5042,'tttttttt-tttt-tttt-tttt-tttttttttttt','AnimHist is a web application that provides an easy way to create and view interactive historical data, so as to enrich the experience of learning about historical events. Historical data is often dense and difficult to comprehend and visualize due to the vast amount of data involved. AnimHist aims to change that by allowing users to easily visualise the data through interactive and animated graphics instead of reading the raw numbers.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Integrated Surgery Training Curriculum ',5043,'tttttttt-tttt-tttt-tttt-tttttttttttt','Integrated Surgery Training Curriculum provides surgeons with an integrated platform to manage their trainings, researches and administrative duties like their training activities, leave applications, call rosters, personal notes and assessments. This project is supervised by Associate Professor Leow Wee Kheng from School of Computing (SoC) of National University of Singapore (NUS) and Consultant Surgeon Dr Ooi Oon Cheong from the National University Heart Centre, Singapore, with the assistance of Jai Sule (Star Trainee) from the National University Hospital (NUH).','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('PPCDL ',5044,'tttttttt-tttt-tttt-tttt-tttttttttttt','The Powered Pleasure Craft Driving License (PPCDL) is required for the driving of powered pleasure crafts within Singaporeﾃｭs port limits. Obtaining a pass in both the theory and practical tests is necessary to get this license. With a license, one is allowed to operate powered pleasure crafts of length not more than 24 metres (excluding the propeller length).','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Procedural Level/Content Generation Tool for Multiplayer Shooter Games ',5045,'tttttttt-tttt-tttt-tttt-tttttttttttt','The Powered Procedural Content Generation (PCG) is the use of algorithmic means to create content dynamically during run-time. In general, PCG brings about two major benefits. The first is the smaller size of the overall program, as we do away with complex models and images. The second is constantly changing and thus interesting content, which adds to player experience.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Ship Snapshot ',5046,'tttttttt-tttt-tttt-tttt-tttttttttttt','Ship Snapshot is an augmented reality marine navigation aid for mobile devices targeted at ship crew. Using sensor information available on a mobile device and additional information from external sources, the application overlays a ship information layer over live camera images.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Gently: Game Streaming System ',5047,'tttttttt-tttt-tttt-tttt-tttttttttttt','Gently is a live streaming video platform and community primarily for gamers. With a website as a front, Gently enables any gamer to broadcast live content on their computer to the site and allows any other person viewing the site to see the broadcasted content in real-time.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Forensics Suite ',5048,'tttttttt-tttt-tttt-tttt-tttttttttttt','The project objective is to develop a stand-alone desktop software which reads mobile device disk images, extract and recover content inside the image and output forensic analysis results in graphical format. The software will allow future developers to develop and implement new features through a plugin framework.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Psychologist chatbot ',5049,'kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk','We have created a psychologist chatbot which will have a conversation with the user and assess the mental health state of the user. The chatbot can provide the estimate (in the form of a certainty factor) of to what degree does the user show symptoms of Anxiety, Depression and Attention Deficit Disorder. The chatbot will also give tips to deal with the highest estimated condition and advise the user to see a real psychologist if needed. This project is aimed at providing an early self-assessment to the users as people are often shy to visit a psychologist immediately.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000149B','Abhinit Kumar Ambastha','a@nus.edu.sg',60000148,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000149B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000149B','5049');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000150B',' Carval Thibaut Pierre Michel','a@nus.edu.sg',60000149,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000150B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000150B','5049');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000151B',' Prashanth Thattai Ravikumar','a@nus.edu.sg',60000150,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000151B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000151B','5049');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Shift Scheduling for Staff ',5050,'kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk','Our project aims to develop a practical rule-based scheduling expert system, using CLIPS expert system shell. Shift planning is of vital importance to a company窶冱 human capital management. It is also a job that requires considerations of various factors from many facets. Our shift planning scheduler endeavours to solve this problem by assigning each staff with an optimal work shift. The methodology we use for our system implementation will be a top-down approach, namely starting from the high level architecture to low level details. At the end, we hope to put our system into real use and help people to work smarter, better and easier.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000152B','Lim Bang Hui','a@nus.edu.sg',60000151,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000152B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000152B','5050');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000153B',' Ng Heng Wei Dennis','a@nus.edu.sg',60000152,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000153B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000153B','5050');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000154B',' Oh Qi Xuan','a@nus.edu.sg',60000153,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000154B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000154B','5050');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000155B',' Wang Zi ','a@nus.edu.sg',60000154,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000155B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000155B','5050');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Food Recommendation System ',5051,'kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk','Tourist or lifelong resident, people in Singapore enjoy sampling its numerous cuisines. However, even the most adventurous people have some limitations to what flavours they like, ways in which their diets must be restricted and other food related preferences. Our system helps people choose something to eat without having them go through the names and images of unfamiliar dishes. This is achieved by asking the user a small number of pertinent questions, trying to determine the dish that best meets the user"s food preferences 窶� Looking for something spicy? Something light? What meat do you want to eat?','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000156B','Low Yee Heng','a@nus.edu.sg',60000155,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000156B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000156B','5051');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000157B',' Pallav Singhal','a@nus.edu.sg',60000156,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000157B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000157B','5051');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000158B',' Zhao Bozhi ','a@nus.edu.sg',60000157,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000158B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000158B','5051');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Cinema Guru ',5052,'kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk','Many movies come out every moth, but it窶冱 hard for us to watch each one of them. Most of us read some reviews of a movie before going to a cinema. However, there are a thousand Hamlets in a thousand people窶冱 eyes. Some movies you are fond of others may have different feelings. Cinema Guru is a knowledge-based expert system that can predict your possible favorite movies in the new few months. By typing in your favorite casts, movie categories or even movies you recently watched, Cinema Guru would suggest a list of movies you may be interested in based on your preferences.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000159B','Chen Xi','a@nus.edu.sg',60000158,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000159B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000159B','5052');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000160B',' Chen Yunjin','a@nus.edu.sg',60000159,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000160B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000160B','5052');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000161B',' Jiang Yaoxuan','a@nus.edu.sg',60000160,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000161B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000161B','5052');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000162B',' Wang Chao ','a@nus.edu.sg',60000161,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000162B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000162B','5052');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('nusHAL ',5053,'kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk','Depending on how flexible the university module system is, a student planning for his/her own curriculum can be a problem. Bad planning can lead to student not getting the module he/she needs or wants and sometimes create heavier workload and timetable clashes the student does not expect. nusHAL is an expert system to solve this problem. Depending on user窶冱 preference and his/her modules taken, nusHAL will recommend the next set of modules the student should take and a timetable to follow. We hope this system is attractive to prospective and current students in NUS.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000163B','Wang Gaoxiang','a@nus.edu.sg',60000162,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000163B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000163B','5053');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000164B',' Du Zhiyuan','a@nus.edu.sg',60000163,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000164B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000164B','5053');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000165B',' Zou Yuguo','a@nus.edu.sg',60000164,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000165B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000165B','5053');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000166B',' Valencia Clarissa Widjaja ','a@nus.edu.sg',60000165,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000166B','kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000166B','5053');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Improving STePS ',5054,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz','Our project vision is to revolutionise the future of STePS. We aim to use automation to significantly reduce the workload on the STePS organising team. The registration process would be done online and the STePS information pages would be dynamically updated. In addition, our data storage system would allow for increased searchability, resulting in easier analysis of data and statistics of past events. Our new system promises increased usability for both organisers and participants alike. Join us in ushering in the future of STePS!','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000167B','Low Sharmine','a@nus.edu.sg',60000166,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000167B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000167B','5054');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000168B',' Tan Mun Aw','a@nus.edu.sg',60000167,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000168B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000168B','5054');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000169B',' Leong Wei Ming','a@nus.edu.sg',60000168,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000169B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000169B','5054');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000170B',' Nicholas Lum Aik Yong ','a@nus.edu.sg',60000169,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000170B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000170B','5054');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('NOI ',5055,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz','This Singapore National Olympiad in Informatics (NOI) website is only used annually around mid January - late March when various JCs and Secondary schools in Singapore want to find information about the next NOI. We aim to provide a better user experience for those using this website.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000171B','Cheng Wah Man','a@nus.edu.sg',60000170,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000171B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000171B','5055');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000172B',' Chong Jia Wei','a@nus.edu.sg',60000171,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000172B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000172B','5055');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000173B',' Renaldy Audry Widjaja ','a@nus.edu.sg',60000172,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000173B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000173B','5055');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('NUS Module Wiki ',5056,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz','Crowdsourcing is a fast and efficient way of gathering knowledge/resources, especially for freshmen who want to seek opinions regarding modules. Much of the important information regarding modules are not mentioned on the official websites. Hence, the aim of NUS Module Wiki is to expand on it with the inclusion of more user-generated content. The end product will be similar to a Wikipedia for modules where some content obtained from NUSMods API and other user-generated content created, maintained and updated by students/lecturers.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000174B','Choo Jia Le','a@nus.edu.sg',60000173,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000174B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000174B','5056');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000175B',' Daryl Ng Wee Kiat','a@nus.edu.sg',60000174,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000175B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000175B','5056');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000176B',' Iain Philip Meeke ','a@nus.edu.sg',60000175,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000176B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000176B','5056');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('ICPC ',5057,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz','NUS SoC will host ACM International Collegiate Programming Contest (ICPC) Singapore Regional Contest again this year. The current webpage is drafted by Dr Steven Halim "in a few hours" just to have a minimal web presence. Reference: The flashy 2014 ACM ICPC Asia Bangkok or 2014 ACM ICPC Asia Jakarta or Google around for past ACM ICPC Regionals and/or World Finals contest webpage for inspiration on how good (or poor) some contest webpages are.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000177B','Jonathan Darryl Widjaja','a@nus.edu.sg',60000176,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000177B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000177B','5057');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000178B',' Tung Meng Hao','a@nus.edu.sg',60000177,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000178B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000178B','5057');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000179B',' Wang Chao ','a@nus.edu.sg',60000178,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000179B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000179B','5057');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('PRO-folio ',5058,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz','This project is supposed to design a new web framework for professor profile. With the new design, a professor can easily trace the history information, maintain the current teaching and researching stuff and edit the personal statement. Meanwhile, there will be an admin page for professors to update the contents and select the visibility of different sections in the site by their distinct preferences.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000180B','Lin Fanshi','a@nus.edu.sg',60000179,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000180B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000180B','5058');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000181B',' Wang Jinghan','a@nus.edu.sg',60000180,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000181B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000181B','5058');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000182B',' Wang Zhipeng ','a@nus.edu.sg',60000181,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000182B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000182B','5058');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('NUS Whispers ',5059,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz','The confessions wave took the whole Singapore by storm in 2012. Many daring souls created confessions pages for organizations on Facebook, so that their peers could share their darkest secrets/gossips in an anonymous fashion. There窶冱 too much manual work in the current way that the admins of the confessions page are handling submitted confessions. This project aims to develop a web portal where anonymous users can submit confessions and in turn admins can automatically repost them to Facebook easily.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000183B','Erin Teo Yi Ling','a@nus.edu.sg',60000182,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000183B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000183B','5059');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000184B',' Melvin Lee Wei Ming','a@nus.edu.sg',60000183,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000184B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000184B','5059');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000185B',' Zhou Yichen ','a@nus.edu.sg',60000184,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000185B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000185B','5059');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Private IVLE ',5060,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz','NUS IVLE has been around since year 2000 (or earlier) when Steven first joined NUS as an undergraduate student. There are improvements along the way but the core system remains the same throughout all these years. There are "many virtual learning environment" features that Steven wants IVLE to have, but it does not have it yet. Since he is a web programmer himself, he decided to "create his own IVLE" starting from this semester that is highly customized to the modules that he regularly teaches (currentlyCS3233, our own CP3101B, and later next semester: CS2010). There are several other features that he wants to try but have not implement.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000186B','Sai Charan Mahadevan','a@nus.edu.sg',60000185,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000186B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000186B','5060');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000187B',' Selvam Edwin Francis','a@nus.edu.sg',60000186,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000187B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000187B','5060');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000188B',' Supraja Bhavani Sekhar','a@nus.edu.sg',60000187,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000188B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000188B','5060');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000189B',' Viswanathan Chandrashekar ','a@nus.edu.sg',60000188,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000189B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000189B','5060');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('VisuAlgo Internationalization ',5061,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz','VisuAlgo is currently a successful website for various Computer Science students/lecturers in the world to learn and practice on basic Data Structures and Algorithms. We want VisuAlgo to go international by having a built-in translation system that localizes the English messages found in VisuAlgo system to the visitor local language. We want to do this in a scalable manner.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000190B','Anand Sundaram','a@nus.edu.sg',60000189,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000190B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000190B','5061');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000191B',' Nguyen Hoang Vu','a@nus.edu.sg',60000190,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000191B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000191B','5061');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000192B',' Nguyen Viet Dung','a@nus.edu.sg',60000191,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000192B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000192B','5061');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000193B',' Savin Varshney ','a@nus.edu.sg',60000192,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000193B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000193B','5061');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('NUS Polls ',5062,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz','NUS Polls is a website that creates polls via crowdsourcing from NUS students. Crowdsourcing is a fast and efficient way of gathering knowledge/resources, especially for NUS freshmen who are clueless about many things. For longer questions, Quora is doing a good job. But sometimes, we just want bite-sized information that can be consumed easily. NUS student/organizations might want to get feedback/opinions regarding certain events. These questions have to be disseminated to many people on a large scale within a short period of time. This is where NUS Polls comes in.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000194B','Lee Gim Koon','a@nus.edu.sg',60000193,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000194B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000194B','5062');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000195B',' Loy Yusong','a@nus.edu.sg',60000194,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000195B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000195B','5062');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000196B',' Yan Ting Zhe ','a@nus.edu.sg',60000195,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000196B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000196B','5062');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('NUSHapz ',5063,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz','NUShapz brings students together to discover the latest NUS happenings and events as a community. Building on the concept of unity in diversity, we aim to showcase the vibrancy that the NUS campus life has to offer and allow students to more effectively reach out and invite their friends to join them in whatever they do. In not limiting to just official school events, we create opportunities for increase participation and awareness of anything that is fun and enriching within NUS.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000197B','Chua Chia Wei','a@nus.edu.sg',60000196,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000197B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000197B','5063');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000198B',' Kenson Tan Kian Seng','a@nus.edu.sg',60000197,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000198B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000198B','5063');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000199B',' Nigel Cheok Jianxing','a@nus.edu.sg',60000198,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000199B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000199B','5063');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000200B',' Sothearith Sreang ','a@nus.edu.sg',60000199,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000200B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000200B','5063');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('DataGoPro ',5064,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz','Testing before releasing/ deploying code is a good practice for every coder. Besides corner cases, testing the code against random data is usually a cheaper way to verify the robustness of a code. However, writing the data generator sometimes is not a pleasant and trivial task, and usually doubles the headache: how to make sure the data itself doesn窶冲 contain any flaws? DataGoPro aims to provide a sophisticated data generation scheme to help every coder to generate suitable and abundant random input for specific problems.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000201B','Huang Da','a@nus.edu.sg',60000200,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000201B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000201B','5064');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000202B',' Su Han','a@nus.edu.sg',60000201,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000202B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000202B','5064');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000203B',' Wu Xudong','a@nus.edu.sg',60000202,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000203B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000203B','5064');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000204B',' Zhang Yichuan ','a@nus.edu.sg',60000203,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000204B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000204B','5064');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('IVLE CloudSync++ ',5065,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz','There is an official version named IVLE Cloud Sync (http://cloudsync.ivle.nus.edu.sg/). Now, it cannot work correctly. The page will stuck to waiting for getting files and clicking settings button also have no reactions. There is a new version done by one of our teammates (http://ivled.sshz.org/). This version is a bit complicated and not user-friendly enough. We plan to build a new version of IVLE dropbox sync that is more convenient and good-looking.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000205B','Huang Weilong','a@nus.edu.sg',60000204,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000205B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000205B','5065');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000206B',' Huang Yue','a@nus.edu.sg',60000205,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000206B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000206B','5065');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000207B',' Lu Shumin','a@nus.edu.sg',60000206,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000207B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000207B','5065');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000208B',' Zhang Mengdi ','a@nus.edu.sg',60000207,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000208B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000208B','5065');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Competitive Programming Textbook Companion Website ',5066,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz','Steven wrote "Competitive Programming" textbook for ACM ICPC, IOI, and also for his CS3233 or other algorithm modules, including CS2020/2010. He has built this "static" book companion website. There are parts that can now be automated, like the collection of errata, the collection of testimonials, etc.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000209B','Ang Aik Siang','a@nus.edu.sg',60000208,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000209B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000209B','5066');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000210B',' Eric Ewe Yow Choong','a@nus.edu.sg',60000209,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000210B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000210B','5066');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000211B',' Gao Risheng ','a@nus.edu.sg',60000210,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000211B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000211B','5066');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Multiplayer Word Game ',5067,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz','Real-time multiplayer word game. Objective of the game is to find as many words as possible in a randomly generated board of letters. Player can login, and find a player to play against or play with in real-time.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000212B','Nguyen Le Minh Dat','a@nus.edu.sg',60000211,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000212B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000212B','5067');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000213B',' Cao Luu Quang ','a@nus.edu.sg',60000212,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000213B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000213B','5067');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Tembusu College Orientation ',5068,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz','This web platform aims to enable freshmen entering Tembusu College to find out more about the events and people who await them. It also aims to introduce them to life in Tembusu College.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000214B','David Rafael Vasquez','a@nus.edu.sg',60000213,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000214B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000214B','5068');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000215B',' Moazzam Ali Khan','a@nus.edu.sg',60000214,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000215B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000215B','5068');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000216B',' Zhu Jiarui ','a@nus.edu.sg',60000215,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000216B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000216B','5068');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('WeMeet ',5069,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz','An easy way to find out when everyone is free for your next meeting or event.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000217B','Lewis Haris Nata','a@nus.edu.sg',60000216,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000217B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000217B','5069');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000218B',' Nguyen Khac Tung','a@nus.edu.sg',60000217,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000218B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000218B','5069');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000219B',' Ong Wei Yang Lionel','a@nus.edu.sg',60000218,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000219B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000219B','5069');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000220B',' Patnaik Sritam ','a@nus.edu.sg',60000219,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000220B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000220B','5069');
INSERT INTO `project` (`title`,`project_id`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('NUSCal ',5070,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz','Losing track of all those modules deadlines? We feel you. NUSCal allows you to track your module deadlines and keep track of any NUS events you choose to sign up.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000221B','Amitkumar Gamane','a@nus.edu.sg',60000220,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000221B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000221B','5070');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000222B',' Jan Fredrik Dahlin','a@nus.edu.sg',60000221,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000222B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000222B','5070');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000223B',' Michael Limantara','a@nus.edu.sg',60000222,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000223B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000223B','5070');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000224B',' Tan Yui Wei (Chen Yuwei) ','a@nus.edu.sg',60000223,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000224B','zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000224B','5070');
