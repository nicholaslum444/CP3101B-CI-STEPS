<?php

define("USER_TYPE_STUDENT", 3);
define("USER_TYPE_LECTURER", 2);
define("USER_TYPE_ADMIN", 1);
define("USER_TYPE_UNKNOWN", -1);

define("LOADER_TYPE_PUBLIC_VOTE", 19);
define("LOADER_TYPE_PUBLIC_SPONSORS", 18);
define("LOADER_TYPE_PUBLIC_REGISTER", 17);
define("LOADER_TYPE_PUBLIC_ABOUT", 16);
define("LOADER_TYPE_PUBLIC_MODULES", 15);
define("LOADER_TYPE_PUBLIC_HOME", 14);
define("LOADER_TYPE_STUDENT", 13);
define("LOADER_TYPE_LECTURER", 12);
define("LOADER_TYPE_ADMIN", 11);
define("LOADER_TYPE_UNKNOWN", -11);

define("FOOD_PREFERENCE_VEGETARIAN", 1);
define("FOOD_PREFERENCE_NON_VEGETARIAN", 2);
define("FOOD_PREFERENCE_MUSLIM", 3);
define("FOOD_PREFERENCE_NON_MUSLIM", 4);

/*

Explanation
^ - anchor at the beginning of the expression
[A-Z] - match 1 capital letter
\d{7} - match 7 characters in the digits class
$ - anchor at the end of the expression

*/
define("REGEX_STUDENT_ID", "/^[aA]\d{7}[a-zA-Z]?$/");
