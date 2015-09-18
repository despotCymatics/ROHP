<?php
/**
 * The template for displaying all pages
 */
?>
<?php get_header(); ?>

<div class="gutter">

    <?php
    if ( has_post_thumbnail() ) : ?>
        <div class="featuredImage">
            <?php the_post_thumbnail(); ?>
            <!--img src="images/featured.jpg"-->
        </div>
    <?php endif; ?>

    <div class="content">
        <div class="row no-margin no-padding">
            <div class="col-lg-12">
                <div class="pageTitle">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
        <div class="row no-margin no-padding">
            <div class="col-sm-8">
                <div class="articleBody">
                    <?php if ( have_posts() ) : while( have_posts() ) : the_post();
                        the_content();
                    endwhile; endif; ?>

                    <button type="button" class="btn btn-default btn-lg">Register here for sessions</button>
                    <h4 class="questionNtoggler">How many people total can fit into the party room?</h4>
                    <div class="answerBox">
                        Each package will state which party room is included and the capacity. Our smaller ground level room will accommodate up to 29 guests total (this would include parents). Our larger court and rink side rooms will accommodate 30-50 people.  </div>
                    <h4 class="questionNtoggler">What if I have more than 15 children that would like to participate?</h4>
                    <div class="answerBox">
                        If you have more than the suggested number of children for the party, then we would need to bring in another sport leader, to help run the games. The cost is $70, and you can have up to 11 more children for each package.</div>
                    <h4 class="questionNtoggler">Can you tell me what is involved with each theme for the All Star Sports Party?</h4>
                    <div class="answerBox">
                        If you have a sports lover – we have the games! Your sports fan can choose their favourite sport – Basketball, Soccer, Badminton and Table Tennis, or Volleyball. The hour of activity will incorporate fun-filled mini games and challenges based on the theme! Mini games will incorporate fundamental skills for children at all levels, while including the perfect combination of fun for your child’s birthday party!</p>
                        <p>The Fun Relays and Games are great themes for children who do not necessarily have one favourite sport! They will include a variety of fun games that will help participants satisfy a number of different movement challenges such as leaping, rolling, balancing, crawling, cutting, and dodging.<br />
                            This theme will also incorporate open court games – those that while they use mainstream sport skills, are not based with mainstream sports in mind. Capture the Flag, Dodgeball, Deer Hunter, or Gaga, are all great examples of open court games.</p>
                        <p>The Gold Medal Games package is very similar to the fun relays and open court games, however will incorporate an Olympic feel to the activities. The children will play Olympic themed games and challenges (bobsleigh, biathlon or triathlon), as well as a variety of other open court games.</p></div>
                    <h4 class="questionNtoggler">Can I choose more than one theme for the All Star Sports Party?</h4>
                    <div class="answerBox">
                        Yes – you can choose more than one theme for your party. Your sport leader would spend half of the hour with one theme, and the other half hour with the second theme!
                    </div>
                    <h4 class="questionNtoggler">Can you tell me what activities are involved with the Toddler Roll &amp; Rumble Party?</h4>
                    <div class="answerBox">
                        The toddler party activities will take place on our toddler court – a court set up with Cheerleading equipment, including a variety of soft tumbling mats, slides, trampolines, and ramps. Our sport leaders will set up a relay and obstacle course for the toddlers to run through. They may also bring in our parachute, as well as horse shoes, soft balls, small dodge balls, and targets for kicking and throwing. All of the activities are designed to encourage active discovery of striking, catching, locomotion’s, and body awareness, all while having fun!</div>
                    <h4 class="questionNtoggler">Will the party room be decorated?</h4>
                    <div class="answerBox">
                        We will set the party room up with tables and chairs before you arrive. You are welcome to come in 30 minutes before your guests arrive to decorate the room for your party. As long as all of the decorations come down at the end of the party without damage to the party room, banners, balloons, and more are all welcome!</div>
                    <h4 class="questionNtoggler">What are some items I may need to bring?</h4>
                    <div class="answerBox">
                        To help get you started – here are a few ideas of what you may want to bring on the day of your child’s birthday party:<br />
                        • Cooler for your cake<br />
                        • Lighter and candles for your cake<br />
                        • Serving utensils<br />
                        • Table cloths for the party tables (inquire with your coordinator for the exact size of the tables)<br />
                        • Fun decorations for the party room (plus any sticky tack or gentle tape to hang them with)<br />
                        • Big smiles and lots of energy ready for an exciting and active party!
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum exercitationem fuga ipsum inventore quis perspiciatis, officiis sapiente, odio corporis commodi maiores iure sunt deleniti, laboriosam veritatis assumenda rerum dolorum. Explicabo alias quo nam illo ipsa a nobis dignissimos. Magnam cumque asperiores rerum tempore voluptatum officia fugiat fugit placeat natus, id perferendis. Sequi beatae eaque repellat excepturi architecto est eos aliquam nobis quibusdam culpa, necessitatibus, nihil error rem laborum a dignissimos! Hic sequi expedita at veniam rem aliquid, non commodi voluptatibus voluptatem optio inventore officia, ipsam deserunt sapiente nesciunt! Cumque nesciunt magni quod, iste, culpa impedit, ratione nostrum quisquam labore ex ipsum dolorem, illo! Repellendus consequatur facere repellat accusamus. Esse, quidem dolor. Fugiat libero velit cum ea architecto eum alias, voluptatum, deserunt facilis reprehenderit? Quae amet, aperiam vel voluptate ullam odio asperiores delectus sed ut, ipsum reiciendis.</p>

                    <p>Enim laborum quidem ratione aspernatur pariatur earum, dolores vero quam eos accusantium, ex, tempora amet delectus molestias quaerat temporibus quo incidunt perspiciatis cumque harum numquam officiis obcaecati. Ut laboriosam labore, perspiciatis recusandae amet, distinctio placeat laborum hic consequatur in sunt voluptates. Quidem similique laboriosam consequatur ex molestiae temporibus quam ad fugit debitis cum, placeat incidunt nam natus eos voluptate voluptates. Assumenda deleniti, veniam, eveniet animi architecto laboriosam esse earum eligendi quo nam tenetur, nostrum unde magni harum amet dolores iste deserunt facere totam possimus minus labore accusantium nobis. Doloribus aliquam, similique a at nihil tempore. Voluptatem adipisci repudiandae impedit, rem perferendis voluptatum, dolorem perspiciatis expedita at, itaque sunt fugit nulla sequi tempora aperiam minus libero ea voluptatibus nobis hic saepe autem nam exercitationem.</p>  Iure quia modi ipsum mollitia incidunt numquam vitae laborum repudiandae voluptatibus itaque quasi, totam alias non sit pariatur vel unde nam minima magnam tenetur. Placeat deserunt officiis quia ipsam eos odio velit quam adipisci magni mollitia laborum corporis, quidem, deleniti illo voluptate ducimus fugit quaerat, fugiat veniam! Error, qui reprehenderit. Corporis ipsa fugit velit officia unde temporibus est excepturi praesentium eligendi minima, soluta harum nisi quam asperiores dolores voluptatibus alias porro dolor beatae dignissimos assumenda iste laudantium quisquam, ipsam? Reprehenderit exercitationem quas aut nostrum eius ullam cum sed illo dolore soluta facere ratione provident, alias itaque, explicabo, similique sit culpa! A corrupti exercitationem ratione voluptatem nostrum debitis quod sint vel provident. Suscipit reiciendis commodi, perspiciatis consequatur debitis eveniet voluptatibus magni optio alias quasi aut, dolores pariatur sint ratione, repellat doloremque atque?
                    </p>
                    <p> Molestias cupiditate ipsam, dolorum recusandae. Dolore veritatis delectus enim, iste aliquam, atque architecto officiis dolor quod autem. Doloribus hic nostrum animi voluptatum. Incidunt fugit vitae adipisci porro recusandae corporis maiores debitis provident quae illo laudantium tempore explicabo nesciunt et, eius nostrum beatae quo voluptatibus quas tenetur quasi accusamus necessitatibus molestiae. Reprehenderit exercitationem ab impedit aspernatur accusantium sit beatae ullam, recusandae veniam error nisi labore nulla cumque delectus quasi facilis inventore perspiciatis, eveniet, blanditiis a facere natus. In labore, nobis odit possimus. Atque dolore iure culpa alias error, magni optio modi molestias reprehenderit exercitationem. Amet odit odio, repellat magnam, quas beatae ea minima ad numquam cupiditate atque. Quis qui, repudiandae incidunt eum molestias laborum cumque rem tempora voluptate necessitatibus neque, praesentium quam et quaerat fugiat distinctio. Repellendus debitis, quo qui non laborum doloribus ipsum, eos at enim, ullam quos magni! Ut dolorem necessitatibus dignissimos nam impedit sunt fuga, veniam velit qui soluta praesentium dolore non. Ratione at dolore culpa eos neque libero sunt beatae, sint aspernatur tempore, soluta odit quaerat distinctio hic commodi. Unde enim labore eum dolores quas, culpa doloremque obcaecati alias illum laboriosam, praesentium voluptas et nobis magni officiis est autem animi dignissimos.</p>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="sidebar">
                    <div class="quick-links">
                        <h4><i class="fa fa-link"></i> Quick links</h4>
                        <ul>
                            <li><a href="#" title="Become a Member">Become a Member</a></li>
                            <li><a href="#" title="Drop-in Schedules">Drop-in Schedules</a></li>
                            <li><a href="#" title="Membership &amp; Admission Rates">Membership &amp; Admission Rates</a></li>
                            <li><a href="#" title="Become a Member">About Us</a></li>
                            <li><a href="#" title="Become a Member">Explore</a></li>

                        </ul>
                    </div>
                    <div class="textWidget">
                        <p><img src="images/volleyball-canada.png"></p>
                        <p>Corporis ipsa fugit velit officia unde temporibus est excepturi praesentium eligendi minima, soluta harum nisi quam asperiores dolores voluptatibus alias porro dolor beatae dignissimos assumenda iste laudantium quisquam, ipsam? Reprehenderit exercitationem quas aut nostrum eius ullam cum sed illo dolore soluta facere ratione provident, alias itaque, explicabo, similique sit culpa! A corrupti exercitationem ratione voluptatem nostrum debitis quod sint vel provident.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>





</div>

<?php get_footer(); ?>


