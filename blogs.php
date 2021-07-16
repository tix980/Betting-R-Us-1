<?php
use BettingRUs\Models\Database;

require_once "Models/Database.php";
require_once "vendor/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/f4c9203469.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/main.css" type="text/css">
        <link rel="stylesheet" href="css/blogs.css" type="text/css">
        <title>Blogs</title>
    </head>
    <body>
    <?php include "header.php";
    ?>
        <main>
            <div class="container blogs">
                <div class="blog-post">
                    <h1>Upcoming Releases</h1>
                    <h2>Luca (2021)</h2>
                    <div class="author-releasedate">
                        <p>By Bobby Bob</p>
                        <p>June 16, 2021</p>
                    </div>
                    <img src="images/directors-cut.jpg">
                    <p>Luca is a 2021 American computer-animated coming-of-age fantasy comedy film produced by Pixar Animation Studios and distributed by Walt Disney Studios Motion Pictures. The film is directed by Enrico Casarosa (in his feature-length directorial debut), written by Jesse Andrews and Mike Jones, produced by Andrea Warren, and starring the voices of Jacob Tremblay, Jack Dylan Grazer, Emma Berman, Marco Barricelli, Saverio Raimondo, Maya Rudolph, and Jim Gaffigan. The film is dedicated to Italian musician Ennio Morricone,
                        who was originally considered to compose the soundtrack, but died before he was asked to do so </p>
                    <p>Set on the Italian Riviera between the 50s and 60s, the film centers on Luca Paguro, a sea monster boy with the ability to assume human form while on land, who explores the town of Portorosso with his new best friend Alberto Scorfano, experiencing a life-changing summer.[2] Luca takes inspiration from Casarosa's childhood in Genoa; several Pixar artists were sent to the Italian Riviera gathering research from Italian culture and environment. The sea monsters, a "metaphor for feeling different", were loosely based on old Italian regional myths and folklore.[3][4] The design and animation were inspired by hand-drawn and stop motion works and Hayao Miyazaki's style. Casarosa described the result as a film that "pays homage to Federico
                        Fellini and other classic Italian filmmakers, with a dash of Miyazaki in the mix too"
                    </p>
                </div>
                <div class="blog-post">
                    <h2>Black Widow (2021)</h2>
                    <div class="author-releasedate">
                        <p>By John Doe</p>
                        <p>June 10,2021</p>
                    </div>
                    <img src="images/cinema-pink.jpg">
                    <p>
                        Black Widow is an upcoming American superhero film based on the Marvel Comics character of the same name. Produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures, it is intended to be the 24th film in the Marvel Cinematic Universe (MCU). The film was directed by Cate Shortland from a screenplay by Eric Pearson, and stars Scarlett Johansson as Natasha Romanoff / Black Widow alongside Florence Pugh, David Harbour, O-T Fagbenle, William Hurt, Ray Winstone, and Rachel Weisz.
                        Set after Captain America: Civil War (2016), the film sees Romanoff on the run and forced to confront her past.
                    </p>
                    <p>
                        Development of a Black Widow film began in April 2004 by Lionsgate, with David Hayter attached to write and direct. The project did not move forward and the character's film rights reverted to Marvel Studios by June 2006. Johansson was cast in the role for several MCU films beginning with Iron Man 2 (2010), and began discussing a solo film with Marvel. Work began in late 2017, with Shortland hired in 2018. Jac Schaeffer and Ned Benson contributed to the script before Pearson was hired.
                        Filming took place from May to October 2019 in Norway, Budapest, Morocco, Pinewood Studios in England, and in Atlanta and Macon, Georgia.
                    </p>
                    <p>
                        Following the events of Captain America: Civil War (2016),[3] Natasha Romanoff finds herself alone and forced to confront a dangerous conspiracy with ties to her past. Pursued by a force that will stop at nothing to bring her down,
                        Romanoff must deal with her history as a spy and the broken relationships left in her wake long before she became an Avenger.[4][5]
                    </p>


                </div>

            </div>
        </main>
    <?php include "footer.php";
    ?>
    </body>
</html>