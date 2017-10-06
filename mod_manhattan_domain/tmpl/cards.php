<div class="mod-manhattan-domain mod-manhattan-domain-cards">
    <?php foreach ($data->customRankings AS $customRanking) : ?>
        <div class="keyword keyword-card">
            <div class="keyword-name"><?php echo $customRanking->keyword ?></div>
            <div class="keyword-position">
                <div class="position-value"><?php echo $customRanking->position ?></div>
                <div class="position-text"><?php echo JText::_('MOD_MANHATTAN_DOMAIN_POSITION'); ?></div>
            </div>
            <?php
            if ($customRanking->position_change < 0) {
                $trendClass = "negative";
                $trendText  = $customRanking->position_change;
            } else {
                if ($customRanking->position_change > 0) {
                    $trendClass = 'positive';
                    $trendText  = '+' . $customRanking->position_change;
                } else {
                    $trendText = '';
                    if ($customRanking->position_change === 0) {
                        $trendClass = 'no-change';
                    } else {
                        $trendClass = 'new';
                    }
                }
            }
            ?>
            <div class="keyword-position-trend <?php echo $trendClass; ?>">
                <span><?php echo $trendText; ?></span>
            </div>
            <div class="keyword-search-results-total">
                <?php echo number_format($customRanking->total, 0, ',', '.'); ?>
                <?php echo JText::_('MOD_MANHATTAN_DOMAIN_SEARCH_RESULTS_TOTAL'); ?>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="last-updated">
        <?php echo JText::_('MOD_MANHATTAN_DOMAIN_LAST_UPDATED'); ?>:
        <?php echo JHtml::_('date', $data->request_info->datetime, 'd.m.Y H:i'); ?>
    </div>
</div>