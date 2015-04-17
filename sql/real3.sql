INSERT INTO `STEPSiteration` (`iteration`,`semester`) VALUES (7,'1415/2')

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
('IS5126',7,'Hands-On With Business Analytics','Business Analytics is the growing, inter-disciplinary field of bringing data to build business insights and support decisions. The goal of the course is to bridge the divide between technical skills and business know-how. Through learning-by-doing, students will engage in a series of business case study discussions, guided group projects, and a final semester project of their own design. Lectures will cover practical skills using the latest tools and techniques, as well as discuss business cases and applications. The module will give students practice in the 'data funnel' from gathering and collecting data, extraction-transformation-loading, analysis, and interpretation. Applications will cover areas such as retailing, customer relationship management (CRM), social media, and marketing.',54,'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy'),
('CS3217',7,'Software Engineering on Modern Application Platforms','Students will learn about the essential Software Engineering (SE) principles and develop their SE skills by writing mobile apps for the iOS platform. During the second half of the semester, students will work in teams of not more than 4 students to develop cool and innovative iOS apps. Students can pretty much develop whatever apps that they desire as long as it is not immoral and does not compromise learning values. Visit our FaceBook page on https://www.facebook.com/cs3217 to find out more about the apps that were created by past students from CS3217.',41,'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx'),
('CS3218',7,'Multimodal Processing in Mobile Platforms','Modern mobile platforms such as smart phones and tablets are equipped with an increasing number of sensing modalities. In addition to traditional components such as keyboards and touch screens, they are also equipped with cameras, microphones, inertial sensor, and GPS receivers. With these modalities all packed into a single platform, it is important to empower application developers with basic knowledge and practical skills in dealing with these modalities. This module introduces the students to basic theories, concept and practical skills needed in input, processing and output of multimodal data on mobile platforms.', 18,'qqqqqqqq-qqqq-qqqq-qqqq-qqqqqqqqqqqq'),
('CS3240',7,'Interaction Design','CS3240 Interaction Design is intended for students in computing and related disciplines whose work focuses on human-computer interaction issues in the design of computer systems. The course stresses the importance of user-centered design and usability in the development of computer applications and systems. Students are taken through the analysis, design, development, and evaluation of human-computer interaction methods for computer systems. They acquire hands-on design skills through laboratory exercises and assignments. The course covers HCI design principles and emphasizes the importance of contextual, organizational, and social factors in interaction design.',52,'pppppppp-pppp-pppp-pppp-pppppppppppp'),
('CS3247',7,'Game Development','The objective of CS3247 Game Development module is to introduce techniques for electronic game design and programming. This module covers a range of important topics including 3D maths, game physics, game AI, sound, as well as user interface for computer games. Furthermore, it will give an overview of computer game design, publishing and marketting to the students. Through laboratory projects, the students will have hands-on programming experience with popular game engines and will develop basic games using those engine. Module Theme: 'Design to Market'. Expected Outcome: After completing the course students will be able to create Games Independently (Indie Game Developers - individual or a small team) as well as work in a team of large Game projects/studios.',50,'oooooooo-oooo-oooo-oooo-oooooooooooo'),
('CS3284',7,'Media Technology Project II','This module is the second part of a two-part series on the development of media technology systems such as interactive systems, games, retrieval systems, multimedia computing applications, etc. Students will form project teams to work on media technology projects. This second part focuses on the development of algorithms required for the systems, implementation and testing of the algorithms and the systems, and evaluation of the systems according to the users requirements.',	45,'tttttttt-tttt-tttt-tttt-tttttttttttt'),
('CS4244',7,'Knowledge-Based Systems','This is a module that contains both the theory and practice of building knowledge-based systems. The aim of this module is to prepare students so that they can design and build knowledge-based systems to solve real-world problems. The module starts with motivations, background and history of knowledge-based system development. The main content has five parts: rule-based programming language, uncertainty management, knowledge-based systems design, development and life cycle, efficiency in rule-based language and knowledge-based systems design examples.',18,'rrrrrrrr-rrrr-rrrr-rrrr-rrrrrrrrrrrr'),
('CS4344',7,'Networked and Mobile Gaming','This module aims at providing students with a deep understanding of various technical issues pertaining to the development of networked games and mobile games. Students will be exposed to concepts from distributed system, operating systems, security and cryptography, networking and embedded systems. In particular, issues such as game server architectures (mirrored, centralized, peer-to-peer etc.), consistency management (bucket synchronization, dead reckoning etc.), interest management, scalability to large number of clients, cheat prevention and detection, and power management will be discussed.',35,'kkkkkkkk-kkkk-kkkk-kkkk-kkkkkkkkkkkk'),
('CP3101B',7,'Web programming and Applications','This module is offered as part of the CP3101 Topics in Computing series. It introduces software development on the web. Topics include networking, clients and servers, HTTP protocol and HTML5 localStorage, HTML5 forms, CSS, dynamically served pages using PHP, DOM, Object Oriented Javascript and jQuery, and combining Javascript and PHP to build an AJAX web application. We will also investigate the use of Javascript, HTML5 canvas, sensor API and mobile platform to build responsive mobile. Some advanced topics may be discussed such as web security and how to generate traffic to your web application.',58,'zzzzzzzz-zzzz-zzzz-zzzz-zzzzzzzzzzzz');

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

INSERT INTO `project` (`title`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Analytics (TBC) ',5000,'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy','The project aims to explain the analytics on how does the people sell and buy the pre-loved items. Main feature is to allow individual to search pre-loved products across multiple sites and to consolidate, rank and compare for the closest match of the desired product. Sellers of the pre-loved goods shall use the analytic arising from the single consolidated venue for searching the pre-loved items, thus helping them to decide on the optimal price before it can posted for sale. Buyers will have the opportunity to compare the price from various products before they can buy it from the market place.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000001B','ABHINAV SARJA','a@nus.edu.sg',60000000,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000001B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000001B','5000');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000002B',' GEORGE SYLVESTER SHANTHA KUMAR','a@nus.edu.sg',60000001,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000002B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000002B','5000');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000003B',' OBAID MUHAMMAD TALHA','a@nus.edu.sg',60000002,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000003B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000003B','5000');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000004B',' VASUDEVAN VIVEKANANTH','a@nus.edu.sg',60000003,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000004B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000004B','5000');
INSERT INTO `project` (`title`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Sailing the uncertain outlook: Customer Satisfaction Analysis in the Singapore Hotel Industry ',5001,'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy','This project aims to analyze and find out the important factors (e.g. value for money, price,Location) of hotels which affect customer satisfaction. The data will be crawled and collected from the hotel booking website. Data will be analyzed and generate result using Tableau. The result will provide valuable insights to customers mainly visitors with family to help them source for their suitable hotels based on their needs, In addition, with the ability of the knowing the correlation of factors, the result will provide hotel management with a platform to better understand behavior and preferences of customers. ','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000005B','LEOW ZHEN ZHEN','a@nus.edu.sg',60000004,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000005B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000005B','5001');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000006B',' NG HWEE TSE CALLY','a@nus.edu.sg',60000005,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000006B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000006B','5001');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000007B',' SUN FEI ','a@nus.edu.sg',60000006,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000007B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000007B','5001');
INSERT INTO `project` (`title`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Mobile Food in Fighting for Crime ',5002,'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy','A new generation of street-food lovers is lining up at food trucks/carts like never before. They are the latest trend in American and world culture. Street-food industry has never been in limelight making it an untapped area of research. In today’s world, pressure of “giving more with less” has made simple and efficient lifestyles in ever increasing demand. People are seeking inexpensive and convenience food for their breakfast, lunch, tea break, or dinner. These factors make the mobile-food concept more appealing than ever.Unknowingly, with the existence of mobile food, it is predicted to also help fight crime.Mobile food hawkers can become the ‘eye of the city’ along with doing their mobile food business.Contributing factors to boost mobile food existence will need to be investigated further. ','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000008B',' BAHAL DHANANJAY RAJESH','a@nus.edu.sg',60000007,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000008B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000008B','5002');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000009B',' JESSICA MARIA TEGUH','a@nus.edu.sg',60000008,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000009B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000009B','5002');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000010B',' RINO KARSONA KADIRMAN','a@nus.edu.sg',60000009,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000010B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000010B','5002');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000011B',' VALENCIA CLARISSA WIDJAJA ','a@nus.edu.sg',60000010,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000011B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000011B','5002');
INSERT INTO `project` (`title`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Analytics (TBC) ',5003,'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy','Census data provides states with a unique insight into the various factors affecting their populace and plays a key role in policy and governing decisions. However census data besides being expensive and tedious to gather are also static and only provide a snapshot in time. We propose to supplement census data with information gathered in real time from social sensors to predict the real time population density for a given geographic region. State activities such as disaster management and planning, state surveillance, infrastructure planning may benefit from such an analysis. ','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000012B','ASHRAF MOHAMMED ABDUL','a@nus.edu.sg',60000011,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000012B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000012B','5003');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000013B',' ASTHA JAIN','a@nus.edu.sg',60000012,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000013B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000013B','5003');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000014B',' HARSHUL GANDHI','a@nus.edu.sg',60000013,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000014B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000014B','5003');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000015B',' JABIR SHABBIR KARACHIWALA ','a@nus.edu.sg',60000014,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000015B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000015B','5003');
INSERT INTO `project` (`title`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Analysis of Aviation Accidents ',5004,'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy','During past decades, airplane has become most popular means of long distance travel. While enjoying this kind of fastest common transportation, people start to raise the concern on the aviation safety. In this study, we will use text mining and propensity score matching etc. to analyze various aspects of aviation accidents, comparing with non-accidents. We will try to find some shared attributes, such as time, location and weather, impacts on the performance of airline companies and then provide recommendations. Our study will be useful for the general public as an education source. And this is also helpful for the industry to improve the safety conditions.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000016B',' HE RUN','a@nus.edu.sg',60000015,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000016B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000016B','5004');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000017B',' LI JIASHU','a@nus.edu.sg',60000016,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000017B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000017B','5004');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000018B',' WANG YONGYI','a@nus.edu.sg',60000017,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000018B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000018B','5004');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000019B',' WU YUE ','a@nus.edu.sg',60000018,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000019B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000019B','5004');
INSERT INTO `project` (`title`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Hire for a long Haul ',5005,'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy','Hiring employees is simply a start to making a solid work force. High turnover costs entrepreneurs in time and workforce productivity. We all know, good employees are elusive and once you have pulled in a splendid individual from staff, it’s just as paramount to ascertain that he stays with the organization. Companies expect at least one thing from every candidate they hire: Will he/she sustain for a decent period of time? Our study proposes to analyze the applicant’s expected stay in an organization in a position amid the enlistment. The analysis would give an idea whether a candidate would stay with an organization for fleeting or long haul. These trends would eventually reduce a company’s sudden attrition rate and helps keep the manpower steady.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000020B','JAYAKUMAR ALAGAPPAN MEENAKSHI','a@nus.edu.sg',60000019,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000020B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000020B','5005');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000021B',' KRISHNA KANNAN','a@nus.edu.sg',60000020,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000021B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000021B','5005');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000022B',' RAGHAVENDHRA BALARAMAN','a@nus.edu.sg',60000021,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000022B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000022B','5005');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000023B',' VISHNU GOWTHEM THANGARAJ ','a@nus.edu.sg',60000022,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000023B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000023B','5005');
INSERT INTO `project` (`title`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Find Your Haven - A predictive analysis to find the safest place in United States',5006,'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy','The United States of America remains an admired place of choice for a remarkable number of people especially students and skilled professionals from all over the world to seek a better life. We intend to develop a suggestion system that would help in identifying suitable places to live in the United States. The primary objective involves analysing the accident, crime and disaster mishaps in United States which are filtered on the specifics of the individual’s profile and requirements. Scores are assigned based on statistical analysis of various factors such as age, alcoholic/non-alcoholic, gender, preferred area of residence, etc., The result of this analysis would suggest a prioritised list of places that are conducive to live in United States.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000024B','ASHWINI RAVI','a@nus.edu.sg',60000023,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000024B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000024B','5006');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000025B',' HUSHMIJA XAVIER','a@nus.edu.sg',60000024,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000025B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000025B','5006');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000026B',' PRASSANTHI MURALIDHARAN','a@nus.edu.sg',60000025,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000026B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000026B','5006');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000027B',' RAMKI RAVINDRAN ','a@nus.edu.sg',60000026,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000027B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000027B','5006');
INSERT INTO `project` (`title`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Analytics (TBC) ',5007,'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy','Ever wondering where is the next Phuket as a traveller or as an investor? Yes, our team holds the same wonder as you do, and we will reveal the next fastest-growing tourism spot for you using data analytics tool. Come and check it out, and simply put it as your next destination if you are a travelling fan, OR get some clues of the new target of investment or financial market from your investor’s point of view.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000028B','DALLE WUILLAUME','a@nus.edu.sg',60000027,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000028B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000028B','5007');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000029B',' LI PINGTING','a@nus.edu.sg',60000028,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000029B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000029B','5007');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000030B',' WANG WEIDUO','a@nus.edu.sg',60000029,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000030B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000030B','5007');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000031B',' ZHANG JIAO ','a@nus.edu.sg',60000030,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000031B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000031B','5007');
INSERT INTO `project` (`title`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Analytics (TBC) ',5008,'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy','As the peer-to-peer lending platforms are gaining popularity, individual investors are exposed to more and better investment opportunities rather than just savings in the banks. But these individual investors may not have the expertise to assess the risks associated with the loans. Our study proposes to build a prediction tool based on the historical loan data, and get some insights on what factors are affecting the default rate of the loans. It aims to predict good/bad investments based on both internal factors (personal info available on the peer-to-peer lending sites) and certain external factors (such as the macro economic conditions).','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000032B','ABHIJNHA','a@nus.edu.sg',60000031,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000032B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000032B','5008');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000033B',' AKANKSHA TIWARI','a@nus.edu.sg',60000032,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000033B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000033B','5008');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000034B',' KARAN SACHDEVA','a@nus.edu.sg',60000033,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000034B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000034B','5008');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000035B',' ZHAO HAINAN','a@nus.edu.sg',60000034,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000035B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000035B','5008');
INSERT INTO `project` (`title`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Targeted Marketing using Machine Learning ',5009,'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy','Banks collect some key customer attributes like demographics, Income , previous loans and they also have some socio-economic features like employment rate. These are very valuable information and can be used to predict customer behavior using historical data. Here based on two years of data, we are trying to predict whether or not a customer would subscribe for a term deposit. This will be very much helpful for the term deposit marketing campaign. The main objective reduce the marketing cost by contacting the right customers instead of mass spamming all the customers. We will be using some machine learning techniques to predict the term deposit subscription probability.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000036B','ABIRAMI SRINIVASAN','a@nus.edu.sg',60000035,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000036B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000036B','5009');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000037B',' PRABAKARAN PROMOTH KUMAR','a@nus.edu.sg',60000036,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000037B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000037B','5009');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000038B',' SHAKIYA SHA ','a@nus.edu.sg',60000037,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000038B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000038B','5009');
INSERT INTO `project` (`title`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Behavior study of “whales” in gaming ',5010,'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy','Gaming industry is very competitive. It is difficult to make addictive games and monetize them. In a fermium game model, it is estimated that only 10% of the gamers pay for features and less than 1% of gamers (known as Whales) contribute to more than 50% percent of the game revenue. Analyzing these whales will help the company to tap in more revenue. In this project we analyze the behavior of these Whales and using this analysis we try to find how we can make non-whale users to make more purchases.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000039B','ANBARASAN THANGAPALAM RATHNAHAR GNANASELWYN','a@nus.edu.sg',60000038,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000039B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000039B','5010');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000040B',' LIU WENRU','a@nus.edu.sg',60000039,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000040B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000040B','5010');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000041B',' RAM VIBHAKAR SUTHAGAR','a@nus.edu.sg',60000040,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000041B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000041B','5010');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000042B',' VU HAI VAN ','a@nus.edu.sg',60000041,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000042B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000042B','5010');
INSERT INTO `project` (`title`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Wine Advisor ',5011,'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy','Over the hundreds of kinds of wine, only a few match the food that you are planning for dinner. How do you know which one? Where to buy it? How to be sure you would even like it? We intend to solve this problem by offering an IT tool based on analytics that will help people match their wine with their food. The result will be a wine to buy but also in which supermarket and for what price. Moreover, based on thousands of consumer reviews and the user’s profile, we will suggest a wine that pleases him.','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000043B','CARVAL THIBAUT PIERRE MICHEL','a@nus.edu.sg',60000042,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000043B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000043B','5011');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000044B',' HUA XIN','a@nus.edu.sg',60000043,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000044B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000044B','5011');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000045B',' LIU XU','a@nus.edu.sg',60000044,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000045B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000045B','5011');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000046B',' SHEENA NASIM ','a@nus.edu.sg',60000045,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000046B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000046B','5011');
INSERT INTO `project` (`title`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Skill Tree ',5012,'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy','Skill Tree aims to help people evaluate themselves against the skill demand in the industry and understand the set of skills and experience required for their “dream jobs”. This is achieved by referencing multiple job sites and analyzing the job details to form a picture of career roles in the industry as well as the requirements and remuneration associated with the role. ?','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000047B','LOO JIAN-JU','a@nus.edu.sg',60000046,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000047B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000047B','5012');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000048B',' SAMPATH BANDARALAGE SAJITH VIMUTHI WEERAKOON','a@nus.edu.sg',60000047,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000048B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000048B','5012');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000049B',' VINCENT FIRMANSYAH','a@nus.edu.sg',60000048,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000049B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000049B','5012');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000050B',' WANG YU HSIN ','a@nus.edu.sg',60000049,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000050B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000050B','5012');
INSERT INTO `project` (`title`,`module_id`,`abstract`,`poster`,`video`) VALUES 
('Analytics (TBC) ',5013,'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy','Good eating is complicated. Everyday food may contain high calories or lack several nutritional value. Many people want to be able to eat healthy and achieve a balanced nutrition. We will like to help by building a food recommendation algorithm that acts as a personal coach that helps the user make the better decisions in terms of what food to eat next. This tool, while easy to use, is targeted at the general public - especially students and parents. We want to help people eat healthier by using data analytics to recommend foods to eat. ?','http://media.tumblr.com/3f81fad6ef163759fff8077580d94752/tumblr_inline_nj4nxkE0C21qersu1.png','https://www.youtube.com/watch?v=MYZfjfkwRII');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000051B','EMILE PAUL MAXIMILIEN BRES','a@nus.edu.sg',60000050,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000051B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000051B','5013');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000052B',' HELMLINGER SIMON PHILIPPE','a@nus.edu.sg',60000051,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000052B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000052B','5013');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000053B',' JUAN MANUEL MUNOZ PEREZ','a@nus.edu.sg',60000052,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000053B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000053B','5013');
INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) VALUES
('A5000054B',' ONG EMERY','a@nus.edu.sg',60000053,2,1);
INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES ('A5000054B','yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy');
INSERT INTO `participate` (`user_id`,`project_id`) VALUES ('A5000054B','5013');
