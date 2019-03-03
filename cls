[33mcommit 460bd205d2226a6cffdc5a42c11de9411ed90cad[m
Author: Rated223 <Rated223@outlook.com>
Date:   Sat Feb 23 14:14:23 2019 -0600

    Add all the elements of the command make:auth, add the routes of register and change password in routes/web.php

[33mcommit 9fdb0b8a4c31bb4bfdad021b42b43f6fdfa41054[m
Author: Rated223 <Rated223@outlook.com>
Date:   Wed Feb 20 17:13:17 2019 -0600

    Add a Vue component to show the notifications in the navbar

[33mcommit ad5f149175b6d3b850ef9a239f491ea376399961[m
Author: Rated223 <Rated223@outlook.com>
Date:   Tue Feb 5 14:39:50 2019 -0600

    finished post feature

[33mcommit 90596d72c5e0a3163d1a7292e83b71e1fd77efd7[m
Author: Rated223 <Rated223@outlook.com>
Date:   Mon Feb 4 15:45:54 2019 -0600

    finished the chat, the selector of a new conversation is working, add notifications of a new message via email

[33mcommit 5f02c6b7af6bae052f9bffc228b75c403bdf1f1a[m
Author: Rated223 <Rated223@outlook.com>
Date:   Sun Feb 3 18:54:34 2019 -0600

    add an image for the users (implement upload a file), add a chat between the users with notifications when a new message is recived

[33mcommit d14395de6dfe98c6eb8f18c152e855377440a63a[m
Author: Rated223 <Rated223@outlook.com>
Date:   Fri Feb 1 12:09:12 2019 -0600

    add a mailable to each listener and a new view in the emails carpet

[33mcommit 85d9610c1746423457cfb28c6ccd717962ed0cca[m
Author: Rated223 <Rated223@outlook.com>
Date:   Sun Jan 27 13:29:28 2019 -0600

    Removed the validation in the creation of a message, add again the event MessageWasRecived

[33mcommit 8e4936dfe667334b1a1bb23293a20131b4cee65e[m
Author: Rated223 <Rated223@outlook.com>
Date:   Sun Jan 27 12:47:23 2019 -0600

    Removed the line that execute the event MessageWasRecived

[33mcommit 692f2e0f6c79acaef9298f7ba04d48e04c572239[m
Author: Rated223 <Rated223@outlook.com>
Date:   Sun Jan 20 18:50:50 2019 -0600

    Rename Auth carpet in resourses/views to lowercase

[33mcommit a35392bc773f227acfbba3e958bac8f1122a3492[m
Author: Rated223 <Rated223@outlook.com>
Date:   Sun Jan 20 18:35:45 2019 -0600

    add a comment in login view

[33mcommit 34bc087200efba816d664b9622447b01d992db4e[m
Author: Rated223 <Rated223@outlook.com>
Date:   Sun Jan 20 18:05:10 2019 -0600

    modified some lines to make unit tests

[33mcommit 5546c68958c5074e4decd829f677b2062b8a45f3[m
Author: Rated223 <Rated223@outlook.com>
Date:   Wed Jan 16 19:16:50 2019 -0600

    Add the validation again in MessagesController

[33mcommit 79068ddb62d98227ec3cea64556d3d4d3e861cdc[m
Author: Rated223 <Rated223@outlook.com>
Date:   Tue Jan 15 18:07:16 2019 -0600

    Procfile file was created

[33mcommit 9d6239e25a1679b70d288a2e1b2e075c70734602[m
Author: Rated223 <Rated223@outlook.com>
Date:   Tue Jan 15 18:01:25 2019 -0600

    Add queues and socket.io

[33mcommit 40f4a4173332e78b6fb0741ad84348eaacff29c9[m
Author: Rated223 <Rated223@outlook.com>
Date:   Wed Dec 19 15:51:56 2018 -0600

    implmenet cache with redis, create a repository, a decorator and an interface for the MessagesController

[33mcommit 90939cddad2093216f4b61f945d9090dec64058f[m
Author: Rated223 <Rated223@outlook.com>
Date:   Mon Dec 17 18:52:39 2018 -0600

    Add an event that send emails every time a new message is received, implement seeders for fill the database and add pagination in the tables

[33mcommit e5314fb863c8986650602b8c260db7d3332ea9b5[m
Author: Rated223 <Rated223@outlook.com>
Date:   Wed Dec 12 16:02:00 2018 -0600

    Add polymorphic relations with the tables tags and notes

[33mcommit 4123cd17f8531e07109447f34113a7b4f9304fb6[m
Author: Rated223 <Rated223@outlook.com>
Date:   Tue Dec 11 17:11:39 2018 -0600

    Restructured User model, add relations between Message and User models, add form for the users views

[33mcommit 3bbde0c2f9d93f36b34272787f998703b1922801[m
Author: Rated223 <Rated223@outlook.com>
Date:   Tue Dec 11 13:25:12 2018 -0600

    implement a policy for the User model, add functions in UsersController, change the hasRoles function in the User model to implement Collections methods

[33mcommit ff0468da3533af94edee5d84eefd20fb5c5a072f[m
Author: Rated223 <Rated223@outlook.com>
Date:   Sun Dec 9 15:05:10 2018 -0600

    add tests with eloquent relations, implement multiple roles for users

[33mcommit c38cb3f97a3cace94e72fc48b495cef2ea9b05e9[m
Author: Rated223 <Rated223@outlook.com>
Date:   Wed Dec 5 13:22:19 2018 -0600

    add design with a style sheet and Bootstrap 4, add roles for the users and more restrictions in the access

[33mcommit 57ba020333580e21f3d264d803e9d821c7ae4548[m
Author: Rated223 <Rated223@outlook.com>
Date:   Tue Dec 4 00:11:22 2018 -0600

    implement authentication for users, and restrictions in the access to certain pages

[33mcommit b15f3f25923f50a9f0b5dfe24cb2532e05ed5b24[m
Author: Rated223 <Rated223@outlook.com>
Date:   Sat Dec 1 18:13:35 2018 -0600

    First commit, create a Eloquent model with the table messages
