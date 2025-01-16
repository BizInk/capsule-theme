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
$team_layout = get_field('team_layout') ?: '4';
$team_layout = intval($team_layout);
if( !empty($team_members) ){ ?>

    <section class="teamlist-section comman-margin">
        <div class="container">
            <div class="row g-lg-5">
                <?php foreach( $team_members as $team_member ){

                    $member_image = get_field('member_image', $team_member);
                    $member_position = get_field('member_position', $team_member);
                    $member_company = get_field('member_company', $team_member);
                    $member_credentials = get_field('member_credentials', $team_member);
                    ?>

                    <div class="<?php if($team_layout == 3): echo 'col-md-6 col-lg-4'; elseif($team_layout == 4): echo 'col-md-6 col-lg-3'; endif;?> team-member">
                        <a href="<?php echo get_permalink($team_member); ?>" class="team-member-wrap">
                            <div class="member-img">
                                <img src="<?php echo $member_image; ?>" class="img-fluid" alt="<?php echo $team_member->post_title; ?>" title="<?php echo $team_member->post_title; ?>">
                            </div>
                            <div class="member-details">
                                <h4><?php echo $team_member->post_title; ?></h4>
                                <?php if( !empty($member_position) ){ ?>
                                    <h6 class="position"><?= $member_position; ?></h6>
                                <?php }
                                if( !empty($member_credentials) ){ ?>
                                    <p class="credentials"><?= $member_credentials; ?></p>
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