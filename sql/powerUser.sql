INSERT INTO `user` (`user_id`,`name`,`email`,`contact`,`user_type`,`food_preference`) 
VALUES 
("A0123456B","Super Student","abc@gmail.com",96323333,3,1),
("A0123457B","Power Student","123@gmail.com",66323333,3,1), 
("A0123458B","Ultra Student","zzz@gmail.com",77323333,3,1),
("A0123459B","Noob Student","noob@gmail.com",88323333,3,1);

INSERT INTO `enrolled` (`user_id`,`module_id`) VALUES 
("A0123456B","aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa"),("A0123456B","cccccccc-cccc-cccc-cccc-cccccccccccc"),("A0123456B","bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb"),
("A0123457B","aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa"),("A0123457B","cccccccc-cccc-cccc-cccc-cccccccccccc"),("A0123457B","bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb"),
("A0123458B","aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa"),("A0123458B","cccccccc-cccc-cccc-cccc-cccccccccccc"),("A0123458B","bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb"),
("A0123459B","aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa"),("A0123459B","cccccccc-cccc-cccc-cccc-cccccccccccc"),("A0123459B","bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb");

INSERT INTO `project` (`title`,`abstract`,`poster`,`video`,`project_id`,`module_id`,`leader_user_id`) 
VALUES 
("SS3101 Super Project","Super Description","www.abc.com/abc","www.abc.com/efg",200,"aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa","A0123457B"),
("ZZ3217 Super Project","Super Description ZZ3217","www.aaabcff.com/abcff","www.abc.com/efg",201,"cccccccc-cccc-cccc-cccc-cccccccccccc","A0123456B");

INSERT INTO `project` (`title`,`abstract`,`poster`,`video`,`project_id`,`module_id`) 
VALUES 
("BB3218 Super Project END","Super Description of BB3218 IS HERE","www.abc.com/abc","www.abc.com/efg",202,"bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb");

INSERT INTO `participate` (`user_id`,`project_id`) 
VALUES 
("A0123456B",200),("A0123457B",200),("A0123458B",200),("A0123459B",200),
("A0123456B",201),("A0123458B",201),("A0123459B",201);