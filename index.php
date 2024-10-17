<?php
session_start();


define('DB_HOST', 'localhost');
define('DB_USER', 'aleksei');
define('DB_PASSWORD', '123456');
define('DB_NAME', 'portfolio_db');

function uploadCommentToDB() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        if (isset($_POST['postComment'])){
            $postID = $_POST['postIDBlog'];
            $comment = $_POST['comment'];
            $date = DATE('Y-m-d');
            $time = DATE('H:i:s');
            echo $postID;
            echo $comment;
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $stmt = $conn->prepare("INSERT INTO COMMENTS (postID, comment, date, time, fname, lname) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $postID, $comment, $date, $time, $_SESSION['fname'], $_SESSION['lname']);

                if ($stmt->execute() === TRUE) {
                    
                    // echo "<br> New record added successfully";
                    // header('Location: index.');
                } else {
                    // echo "Error: " . $stmt->error;
                }
                $stmt->close();
                $conn->close();
            }
        }
    }
}
uploadCommentToDB();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/blog-form.css">
    <link rel="stylesheet" href="index.css">
    <script src="blogForm.js" defer></script>
    <script src="https://kit.fontawesome.com/9acb00af00.js" crossorigin="anonymous"></script>
    <script src="blogComment.js" defer></script>
    <link rel="stylesheet" media="(max-width: 800px)" href="css/index-phone.css">
    

</head>

<body>
    <nav>
    <h1 class="log-container"><?php echo isset($_SESSION['fname']) ? $_SESSION['fname'] . " ". $_SESSION['lname'] : ""; ?> <?php echo (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) ? '(admin)' : ''; ?></h1>
        <a href="#about-me">About</a>
        <a href="#skills">Skills</a>
        <a href="#work-experience">Experience</a>
        <a href="#portfolio">Portfolio</a>
        <a href="#blog">Blog</a>
        <?php
        if (isset($_SESSION['isAdmin']) && ($_SESSION['isAdmin'] == 1)) {
            ?>
            <a href="addEntry.html">Add Post</a>
            <?php
        }
        ?>
        <a href="<?php echo isset($_SESSION['fname']) ? 'logout.php' : 'login.html'; ?>">
            <?php 
            if (isset($_SESSION['fname'])){
                echo "Logout";
            }else{
                echo "Login";
            } 
            ?>
        </a>
    </nav>

    <header>
        <h1> Aleksei Makushin </h1><br>
        <h1> Python Dev | Web Dev | Java Dev </h1>
    </header>

    <hgroup>
        <div class="buttons-social-media">
            <a href="https://www.facebook.com/profile.php?id=100095057290983" class="button-social-media button-facebook" aria-label="Facebook">
            <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://uk.linkedin.com/" class="button-social-media button-linkedin" aria-label="LinkedIn">
            <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="mailto:ave.makru@gmail.com" class="button-social-media button-gmail" aria-label="Mail">
            <i class="fa-regular fa-envelope"></i>
            </a>
            <a href="https://github.com/makushin001" class="button-social-media button-github" aria-label="GitHub">
            <i class="fab fa-github"></i>
            </a>
            <a href="https://www.instagram.com" class="button-social-media button-instagram" aria-label="Instagram">
            <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://t.me/alekseimakush" class="button-social-media button-telegram" aria-label="Telegram">
            <i class="fa-brands fa-telegram"></i>
            </a>
        </div> 
    </hgroup>


    <article id="about-me">

        <section class="about-me-div">
            <h2>
                Hey there &#128075;
            </h2><br>
            <p>Hello there, I'm Aleksei Makushin, a software developer based in the vibrant city of Moscow, Russia. Currently, I'm focusing on developing innovative web applications and exploring the fascinating world of AI.</p><br>
            <p>I'm passionate about crafting efficient and user-friendly software solutions. I believe in the power of simplicity and functionality, and nothing brings me more satisfaction than developing software that is both effective and aesthetically pleasing.</p><br>
            <p>What excites me the most is building web applications and diving deep into the intricacies of Java and Python. I primarily use VS Code and PyCharm as my trusted tools to bring my projects to life.</p><br>
            <p>Let's build something amazing together!"</p>
        </section>


        <section class="education-div">
            <h2>
                Education &#127891;
            </h2>
            <div class="edu-container">
                <div class="edu-alevels">
                    <h2>Alevels:</h2>
                    <div class="edu-btns">
                        <a href="#" class="edu-btn maths" aria-label="Maths">
                            <span class="card">Maths (A)</span>
                        </a>
                        <a href="#" class="edu-btn further-maths" aria-label="Further Maths">
                            <span>Further Maths (A)</span>
                        </a>
                        <a href="#" class="edu-btn econ" aria-label="Economics">
                            <span>Economics (A)</span> 
                        </a>
                        <a href="#" class="edu-btn cs" aria-label="Computer Science">
                            <span>Computer Science (B) </span>
                        </a>
                    </div>
                </div>
                <div class="edu-uni">
                    <h2>Queen Mary University London:</h2>
                    <div class="edu-btns">
                        <a href="#" class="edu-btn comp-sci" aria-label="Computer Science">
                            <span>Computer Science</span>
                        </a>
                        <a href="#" class="edu-btn ai" aria-label="Artificial Intelligence">
                            <span>Artificial Intelligence</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <figure>
            <img src="img/profile-pic.JPG" alt="Aleksei Makushin">
        </figure>
    </article>



    <div class="portfolio-and-skills">
        <article id="portfolio">
        
            <section class="slider-frame">
                <div class="slider">
                    <div class="portfolio-post" id="portfolio-slide-1">
                        <div class="text">
                            <h2>Project STASY: A Comprehensive Stock Screener</h2>
                            <p>Project STASY is a powerful stock screener program designed to empower traders and investors. It allows users to filter and sort stocks based on a variety of metrics such as price, volume, market cap, dividend yield, and more.</p>
                            <p>With its user-friendly interface, STASY makes it easy to navigate the complexities of the stock market. Users can customize their screening criteria to match their investment strategies, making it a versatile tool for both novice and experienced investors....</p>
                        </div>
                        <img src="img/stock-screener.png" alt="Stock Screener">
                    </div>
                    <div class="portfolio-post" id="portfolio-slide-2">
                        <div class="text">
                            <h2>Algorithmic Trading App: Your Companion for Smart Trading</h2>
                            <p>The Algorithmic Trading App is a cutting-edge trading application that screens the market in real time and provides trading signals based on predefined algorithmic strategies. It's designed to help traders make informed decisions swiftly and accurately.</p>
                            <p>With its advanced algorithms, the app can analyze market trends, identify potential trading opportunities, and generate signals when certain conditions are met. This allows traders to execute trades at the optimal moment, maximizing their potential profits.</p>
                        </div>
                        <img src="img/algo-trading.png" alt="Algorithmic Trading App">
                    </div>
                    <div class="portfolio-post" id="portfolio-slide-3">
                        <div class="text">
                            <h2>The Pattern Analyzer Trading App: Your tool to find market trends</h2>
                            <p>The Pattern Analyzer Trading App is a sophisticated tool that combines technical indicators, first- and second-order stock derivatives, and pattern recognition algorithms to assist traders in identifying potential trends, reversals, and continuation patterns in various stocks.</p>
                        </div>
                        <img src="img/pattern-analyzer.PNG" alt="Pattern Analyzer App">
                    </div>
                </div>
        
                <div class="slider-nav">
                    <a href="#portfolio-slide-1"></a>
                    <a href="#portfolio-slide-2"></a>
                    <a href="#portfolio-slide-3"></a>
                </div>
            </section>
        </article>

        <article id="skills">
            <section class="skills-div">
                <h2 class="header">
                    Skills &#128396; in Portfolio
                </h2>

                <div class="skills-card skills-card-1">
                    <p>HTML</p>
                    <img src="img/html.png" alt="HTML">
                </div>
                <div class="skills-card skills-card-2">
                    <p>CSS</p>
                    <img src="img/css.png" alt="CSS">
                </div>
                <div class="skills-card skills-card-3">
                    <p>JS</p>
                    <img src="img/js.png" alt="JS">
                </div>
                <div class="skills-card skills-card-4">
                    <p>PHP</p>
                    <img src="img/php.png" alt="PHP">
                </div>
                <div class="skills-card skills-card-5">
                    <p>Java</p>
                    <img src="img/java.png" alt="Java">
                </div>
                <div class="skills-card skills-card-6">
                    <p>Python</p>
                    <img src="img/python.png" alt="Python">
                </div>
                <div class="skills-card skills-card-7">
                    <p>Swift</p>
                    <img src="img/swift.png" alt="Swift">
                </div>
                <div class="skills-card skills-card-8">
                    <p>MySQL</p>
                    <img src="img/mysql.png" alt="MySQL">
                </div>
                <div class="skills-card skills-card-9">
                    <p>Arduino</p>
                    <img src="img/arduino.png" alt="Arduino">
                </div>
            </section>
        </article>
    </div>




        <article id="work-experience">
            <div>
                <h1>Work Experience:</h1>
            </div>

            <section class="work-experience-div">
                <div class="work-experience-card">
                    <h2>Barista</h2>
                    <p>Starbucks</p>
                    <p>2020 - 2021</p>
                </div>
                <div class="work-experience-card">
                    <h2>Python Dev</h2>
                    <p>Self-employed</p>
                    <p>2021 - 2023</p>
                </div>
                <div class="work-experience-card">
                    <h2>Data Scientist</h2>
                    <p>Real Estate Agency</p>
                    <p>2023 - 2024</p>
                </div>
            </section>
        </article>


    <div class="contact-and-blog">
        <article class="blog-select-container">
            <h1>
                Enter Year and Month!&#x1F3BE;<br>
                <?php echo isset($_SESSION['year']) && isset($_SESSION['month'])? "You chose ".$_SESSION['year']. "  "  .$_SESSION['month']. " ": ""; ?>
            </h1>
            <form class="blog-form" action="blog_form.php" method="post">
                <select id="month" name="month" >
                    <option value="">Select Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>

                <select id="year" name="year" >
                    <option value="">Select Year</option>
                    <?php for($i = date("Y"); $i >= 2023; $i--): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                <input class="blog-submit-btn" type="submit" value="Submit" name="submit">
                <input class="blog-reset-btn" type="submit" value="Reset" name="reset">
            </form>
        </article>



        <article id="blog">
            <div>
                <h1>Blog</h1>
            </div>
            <?php
            
            function retrieveEntryFromDB($beginDate, $endDate) {
                $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } else {
                    if ($beginDate == null) {
                        $beginDate = '2023-01-01';
                    }
                    if ($endDate == null) {
                        $endDate = '2050-12-28';
                    }
                    $sql = "SELECT id, title, content, date, time FROM POSTS WHERE date BETWEEN '$beginDate' AND '$endDate'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $posts = array();
                        while($row = $result->fetch_assoc()) {
                            $posts[] = $row;
                        }
                        return $posts;
                    } else {
                        return array(array("id" => "0", "title" => "No posts available at selected date", "content" => "", "date" => "2023-01-01", "time" => "12:00:00"));
                    }
                    $conn->close();
                }
            }

            function getBeginAndEndDate($month, $year) {
                $beginDate = $year . '-' . $month . '-01';
                $endDate = date('Y-m-t', strtotime($beginDate));
                return array('beginDate' => $beginDate, 'endDate' => $endDate);
            }

            function returnPosts(){
                if (isset($_SESSION['year']) && isset($_SESSION['month'])){
                    $dates = getBeginAndEndDate($_SESSION['month'], $_SESSION['year']);
                    return retrieveEntryFromDB($dates['beginDate'], $dates['endDate']);
                } else{
                    return retrieveEntryFromDB(null, null);
                }
            }

            function retrieveCommentsFromDB($postID) {
                $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } else {
                    $sql = "SELECT id, comment, date, time, fname, lname FROM COMMENTS WHERE postID=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $postID);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $comments = array();
                        while($row = $result->fetch_assoc()) {
                            $comments[] = $row;
                        }
                        return $comments;
                    } else {
                        return array(array("id" => "0", "comment" => "Nan", "date" => "", "time" => "", "fname" => "", "lname" => ""));
                    }
                    $conn->close();
                }
            }

            function mergeSort($data) {
                if(count($data) <= 1) {
                    return $data;
                }
            
                $middle = floor(count($data) / 2); 
                $left = array_slice($data, 0, $middle);
                $right = array_slice($data, $middle);
            
                $left = mergeSort($left);
                $right = mergeSort($right);
            
                return merge($left, $right);
            }
            
            function merge($left, $right) {
                $result = array();
                $leftIndex = 0;
                $rightIndex = 0;
            
                while($leftIndex < count($left) && $rightIndex < count($right)) {
                    $leftDate = strtotime($left[$leftIndex]['date'] . ' ' . $left[$leftIndex]['time']);
                    $rightDate = strtotime($right[$rightIndex]['date'] . ' ' . $right[$rightIndex]['time']);
            
                    if($leftDate > $rightDate) {
                        $result[] = $left[$leftIndex];
                        $leftIndex++;
                    } else {
                        $result[] = $right[$rightIndex];
                        $rightIndex++;
                    }
                }
            
                while($leftIndex < count($left)) {
                    $result[] = $left[$leftIndex];
                    $leftIndex++;
                }
            
                while($rightIndex < count($right)) {
                    $result[] = $right[$rightIndex];
                    $rightIndex++;
                }
            
                return $result;
            }


            $posts = mergeSort(returnPosts());
            ?>
            <section class="slider-frame">

                <div class="slider">
                    <?php 
                    for ($i = 0; $i < count($posts); $i++){
                        $post = $posts[$i];
                        ?>
                        <div class="blog-post" id="slide-<?php echo isset($post['id']) ? $post['id'] : '0'; ?>">
                            <div class="text">
                                <h2><?php echo $post['title'];?></h2>
                                <p><?php echo $post['content']; ?></p>
                                <p><?php echo $post['date']. "  ".  $post['time']; ?></p><br>
                                
                                <div class="comments-div">
                                    <div class="comments-header">
                                        <h2>Comments</h2>
                                        <?php 
                                            if (isset($_SESSION['isAdmin'])) {
                                                if ($_SESSION['isAdmin'] == 0) {
                                                    ?>
                                                   <form action="enterComment.php" method="post">
                                                        <input type="hidden" name="postID" value="<?php echo isset($post['id']) ? $post['id'] : '0'; ?>">
                                                        <input class="add-comment-btn-logged-in" type="submit" value="Add Comment" name="addComment">
                                                    </form>
                                                    <?php
                                                } elseif ($_SESSION['isAdmin'] == 1) {
                                                    ?>
                                                    <!-- <form action="editBlogComments.php" method="post">
                                                        <input class="edit-btn" type="submit" value="Edit" name="editComment">
                                                    </form> -->
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <form action="enterComment.php" method="post">
                                                    <input class="add-comment-btn-not-logged-in" type="submit" value="Add Comment" onclick="userCannotLeaveCommentNotLoggedIn(event);">
                                                </form>
                                                <?php
                                            }
                                        ?>
                                    </div>    

                                    <?php

                                    $postID = isset($post['id']) ? $post['id'] : '0';
                                    $comments = retrieveCommentsFromDB($postID);

                                    if (isset($_SESSION['isAdmin']) && ($_SESSION['isAdmin'] == 1)) {
                                        foreach ($comments as $comment) {
                                            ?>
                                            <div class="comment">
                                                <div class="comments-body-header">
                                                    <p>User: <?php echo $comment['fname'] . " " . $comment['lname']; ?></p>
                                                    <p>Left comment on: <?php echo $comment['date'] . " " . $comment['time']; ?></p>
                                                </div>
                                                <p class="comment-text"><?php echo $comment['comment']; ?></p>
                                            </div>
                                            <form action="editComment.php" method="POST">
                                                <input type="hidden" name="postID" value="<?php echo $postID; ?>">
                                                <input type="hidden" name="commentID" value="<?php echo $comment['id']; ?>">
                                                <input type="submit" value="Delete Comment" name="deletePost">
                                            </form>
                                            <?php
                                        }
                                    }else{
                                        foreach ($comments as $comment) {
                                            ?>
                                            <div class="comment">
                                                <div class="comments-body-header">
                                                    <p>User: <?php echo $comment['fname'] . " " . $comment['lname']; ?></p>
                                                    <p>Left comment on: <?php echo $comment['date'] . " " . $comment['time']; ?></p>
                                                </div>
                                                <p class="comment-text"><?php echo $comment['comment']; ?></p>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <img src="img/slide-1.jpg" alt="">
                        </div>
                    <?php } ?>

                    <div class="slider-nav">
                    <?php 
                    for ($i = 0; $i < count($posts); $i++){
                        $post = $posts[$i];
                    ?>
                        <a href="#slide-<?php echo isset($post['id']) ? $post['id'] : '0'; ?>"></a>
                    <?php 
                    } 
                    ?>
                    </div>
                </div>
            </section>
        </article>
    </div>

    <footer>
        <section>
          <p>© 2024 Aleksei Makushin</p>
        </section>
    </footer>
</body>
</html>


