<?php
ini_set('display_errors', '1');
class ratingCustom {
    public static function renderVote($starRating, &$modx, $scriptProperties){
        if (($starRating->startDate == null || date('Y-m-d H:i:s',time()) > $starRating->startDate) && ($starRating->endDate == null || date('Y-m-d H:i:s', time()) < $starRating->endDate)) {
            $voteAllowed = $starRating->allowVote();
            $voteStats = $starRating->getVoteStats();
            /* TODO: replace with lexicon */
            $currentText = round($voteStats['average'].'/'.$starRating->config['maxStars'], 2);
            
            $listItems = array();
            for($i = 0; $i <= $starRating->config['maxStars']; $i++) {
                if ($i == 0) {
                    $listItems[] = $modx->getChunk($scriptProperties['firstStarTpl'], array(
                        'percentage' => $voteStats['percentage'],
                        'currentText' => $currentText
                    ));
                } else {
                    $starWidth = floor(100 / $starRating->config['maxStars'] * $i);
                    $starIndex = ($starRating->config['maxStars'] - $i) + 2;
                    if ($voteAllowed) {
                        $prefix = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
                        if (!empty($starRating->config['urlPrefix'])) {
                            $prefix = $starRating->config['urlPrefix'].'&'.$prefix;
                        }
                        $urlParams = $prefix . '&vote='.$i.'&star_id=' . $starRating->get('star_id') . '&group_id=' . $starRating->get('group_id');
                        $listItems[] = $modx->getChunk($scriptProperties['activeStarTpl'], array(
                            'url' => $modx->makeUrl($modx->resource->get('id'), '', $urlParams) . '" title="' . $i . '/' . $starRating->config['maxStars'],
                            'starWidth' => $starWidth,
                            'starIndex' => $starIndex,
                            'idx' => $i
                        ));
                    } else {
                        $listItems[] = $modx->getChunk($scriptProperties['disableStarTpl'], array(
                            'idx' => $i
                        ));
                    }
                }
            }
            
            $ph['rating'] = $modx->getChunk($scriptProperties['listStarTpl'], array(
                'theme' => $starRating->config['theme'],
                'totalWidth' => $starRating->config['maxStars'] * $starRating->config['imgWidth'],
                'wrapper' => implode($listItems, PHP_EOL)
            ));
        }
        $ph['active'] = intval($voteAllowed);
        // $ph['rating'] = $listItems;
        $ph = array_merge($ph, $voteStats);
        // var_dump($scriptProperties);
        // $chunk = $modx->getObject('modChunk',array(
        //     'name' => $starRating->config['starTpl'],
        // ));
        // if ($chunk) {
        //     $starRating->output = $chunk->getContent();
        // } else {
        //     $starRating->output = '[[+rating]]<span class="totalvotes">Votes: [[+vote_count]]</span>';
        // }
        // foreach ($ph as $key => $value) {
        //     $starRating->output = str_replace('[[+' . $key . ']]', $value, $starRating->output);
        // }
        $starRating->output = $modx->getChunk($scriptProperties['starTpl'], $ph);
        return $starRating->output;
    }
}