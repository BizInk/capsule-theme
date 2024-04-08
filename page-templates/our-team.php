<?php
/**
* Template Name: Our Team
*
* Template to display listing of team members page
*
* @package Understrap
*/
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();

get_template_part('global-templates/inner-banner');

$team_members = get_field('team_members');

if( !empty($team_members) ){ ?>

    <section class="teamlist-section comman-margin">
        <div class="container">
            <div class="row g-lg-5">
                <?php foreach( $team_members as $team_member ){

                    $member_image = get_field('member_image', $team_member);
                    $member_position = get_field('member_position', $team_member);
                    $member_company = get_field('member_company', $team_member); ?>

                    <div class="col-md-6 col-lg-3 team-member">
                        <a href="<?php echo get_permalink($team_member); ?>" class="team-member-wrap">
                            <div class="member-img">
                                <img src="<?php echo $member_image; ?>" class="img-fluid" alt="<?php echo $team_member->post_title; ?>" title="<?php echo $team_member->post_title; ?>">
                            </div>
                            <div class="member-details">
                                <h4><?php echo $team_member->post_title; ?></h4>
                                
                                <?php if( !empty($member_position) ){ ?>
                                    
                                    <h6><?= $member_position; ?></h6>
                                <?php }

                                if( !empty($member_company) ){ ?>
                                    
                                    <p><?= $member_company; ?></p>
                                <?php } ?>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }

get_footer(); ?>