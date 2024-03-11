        <header>
            <nav>
                <div class="logo">
                    <h1> <a href="/">
                            <h1 style="color: #009669;">Ethio</h1>
                            <h1 style="color: black;">Tour</h1>
                        </a> </h1>
                </div>
                <ul class="nav-links">
                    <li><a href="hotels">Hotel</a>
                    </li>
                    <li class="user">
                        <button onmouseleave="document.querySelector('#placeContent').style.display = 'none'"
                            onclick="document.querySelector('#placeContent').style.display = 'block'" class="App__user">
                            <span class="App__username">Place</span>
                            <div class="App__expand-arrow">
                                <svg role="img" height="16" width="16" viewBox="0 0 16 16">
                                    <path d="M13 10L8 4.206 3 10z" fill="#000"></path>
                                </svg>
                            </div>
                            <div class="content" id="placeContent">

                    <li><a href="recommend">Recommended</a></li>
                    <li><a href="topten">Top </a></li>
                    </div>
                    </button>
                    </li>

                    <?php

use Core\Database;

                    $config = include views("/config.php");
                    $class = new Database($config['database']);

                    session_start();
                    $email = $_SESSION['user'];

                    $users = $class->query("SELECT * FROM `user` where email =  '$email'")->fetchAll();
                    foreach ($users as $user) {
                        $name = $user['name'];
                        $userId = $user['id'];
                        $image = $user['profileImage'];
                    }

                    if (isset($_SESSION['user'])) : ?>
                    <li class="user">

                        <button onmouseleave="document.querySelector('#content').style.display = 'none'"
                            onclick="document.querySelector('#content').style.display = 'block'" id="userApp"
                            class="App__user">

                            <span class="App__username"><?= $name ?></span>
                            <div class="App__expand-arrow">
                                <svg role="img" height="16" width="16" viewBox="0 0 16 16">
                                    <path d="M13 10L8 4.206 3 10z" fill="#000"></path>
                                </svg>
                            </div>
                            <div id="content" class="content">
                    <li> <a href="user">Profile</a></li>


                    <li>
                        <form action="logout" method="post">
                            <input type="submit" name="logout" value="LOGOUT">
                        </form>
                    </li>

                    </div>
                    </button>
                    </li>

                    <?php else : ?>
                    <li class="user"> <a href="/login"> Login</a></li>
                    <?php endif; ?>
                    </li>

                </ul>
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </nav>
        </header>

        <?php if ($user['admin'] == 2) : ?>
        <div class="views/admin/">
            <div
                style="transform: rotate(180deg);color:black;text-decoration: none;height: 10px;position: absolute;top: 25px;left: 5px;">
                <a title="Back to dashboard" href="/hotelAdmin"
                    style="color:black;text-decoration: none;font-size:30px;">
                    &#10140 </a>
            </div>
            <?php endif; ?>
            <script>
            const burger = document.querySelector('.burger');
            const line1 = document.querySelector('.line1');
            const line2 = document.querySelector('.line2');
            const line3 = document.querySelector('.line3');
            const nav = document.querySelector('.nav-links');

            burger.addEventListener('click', function() {
                nav.classList.toggle('nav-active');

            });
            </script>
            </body>


            </html>