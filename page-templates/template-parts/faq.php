<?php
$general_settings = get_sub_field('general_settings');
$alignment = get_sub_field_object('alignment');

$faq_title = get_sub_field('faq_title');
$faq_small_title = get_sub_field('faq_small_title');
$faq_description = get_sub_field('faq_description');

// faq_questions
$rows = get_sub_field('faq_questions');

$general_class = '';
$align_class = '';

if (in_array('Add Common Padding', $general_settings)) {
    $general_class .= ' comman-padding';
}

if (in_array('Add Common Margin', $general_settings)) {
    $general_class .= ' comman-margin';
}

if ($rows):
?>
    <section class="infobox-section<?php echo $general_class; ?>">

        <div class="full-width-wysiwyg text-center">
            <div class="container">
                <div class="editor-design">
                    <?php if (!empty($faq_small_title)) { ?>
                        <h6><?php echo $faq_small_title; ?></h6>
                    <?php }

                    if (!empty($faq_title)) { ?>
                        <h2><?php echo $faq_title; ?></h2>
                    <?php }

                    echo $faq_description; ?>
                </div>
            </div>
        </div>

        <div class="container">

            <?php

            echo '<script type="application/ld+json">{"@context": "https://schema.org","@type": "FAQPage","mainEntity": [';
            foreach ($rows as $row) {
                echo '{
                    "@type": "Question",
                    "name": "' . ($row['question'] ?? "") . '",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "' . ($row['answer'] ?? "") . '"
                    }
                },';
            }
            echo ']}</script>';
            ?>

            <div class="accordion" id="faq_questions">
                <?php
                foreach ($rows as $key => $row) {
                ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" itemprop="mainEntity" itemscope itemtype="https://schema.org/Question">
                            <button class="accordion-button <?php if ($key != 0){ echo 'collapsed'; } ?>" type="button" data-bs-toggle="collapse" data-bs-target="#awsner-<?php echo $key; ?>" aria-expanded="true" aria-controls="awsner-<?php echo $key; ?>">
                                <?php echo ($row['question'] ?? ""); ?>
                            </button>
                        </h2>
                        <div id="awsner-<?php echo $key; ?>" class="accordion-collapse collapse <?php if ($key == 0){ echo 'show'; } ?>" data-bs-parent="#faq_questions" itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
                            <div class="accordion-body">
                                <?php echo ($row['answer'] ?? ""); ?>
                            </div>
                        </div>
                    <?php
                }
                    ?>
                    </div>
            </div>
    </section>
<?php
endif;
