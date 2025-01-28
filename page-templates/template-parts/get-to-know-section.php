<?php
$general_settings = get_sub_field('general_settings');
$general_class = '';
if( in_array('Add Common Padding', $general_settings) ){
    $general_class .= ' comman-padding';
}
if( in_array('Add Common Margin', $general_settings) ){
    $general_class .= ' comman-margin';
}
$team_members = get_sub_field('team_members');
$get_to_know_title = get_sub_field('get_to_know_title');
$get_to_know_subtitle = get_sub_field('get_to_know_subtitle');
$team_layout = get_sub_field('team_layout') ?: '4';
$team_layout = intval($team_layout);
$team_links = get_field('disable_teammember_links', 'option') ?? false;
?>
<section class="teamlist-section<?= $general_class; ?>">   
    <div class="full-width-wysiwyg text-center">
        <div class="container">
            <div class="editor-design">
                <h2><?php echo $get_to_know_title ? $get_to_know_title : 'Get to know us'; ?></h2>
                <p><?php echo $get_to_know_subtitle ? $get_to_know_subtitle : ''; ?></p>
            </div>
        </div>
    </div>
    <?php if( !empty($team_members) ): ?>
    <div class="container">
        <div class="team-wrap">
            <div class="row g-lg-5 justify-content-center">
                <?php foreach( $team_members as $team_member  ):
                $member_image = get_field('member_image', $team_member);
                $member_position = get_field('member_position', $team_member);
                $member_credentials = get_field('member_credentials', $team_member);
                
                if( $member_image ){
                    $get_to_know_member_image = $member_image;
                }else{
                    $get_to_know_member_image = get_stylesheet_directory_uri().'/images/team4.jpg';
                } ?>
                <div class="<?php if($team_layout == 3): echo 'col-md-6 col-lg-4'; elseif($team_layout == 4): echo 'col-md-6 col-lg-3'; endif;?> team-member">
                    <?php if(!$team_links): ?>
                    <a href="<?php echo get_permalink($team_member); ?>" class="team-member-link">
                    <?php else: ?>
                    <div class="team-member-link">
                    <?php endif; ?>
                        <div class="team-member-wrap">
                            <div class="member-img">
                                <img src="<?php echo $get_to_know_member_image; ?>" alt="<?php echo esc_html($team_member->post_title); ?>">
                            </div>
                            <div class="member-details">
                                <h4 class="member-name"><?php echo esc_html($team_member->post_title); ?></h4>
                                <?php if(!empty($member_position)): ?><h6 class="designation"><?php echo $member_position ? esc_html($member_position) : ''; ?></h6><?php endif; ?>
                                <?php if(!empty($member_credentials)): ?><p class="credentials"><?php echo $member_credentials ? esc_html($member_credentials) : ''; ?></p><?php endif; ?>
                            </div>
                        </div>
                    <?php if(!$team_links): ?>
                    </a>
                    <?php else: ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>