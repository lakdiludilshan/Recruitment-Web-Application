<?php
//filter the jobs by selected categories
function filterJobsByCategories($selectedCategories, $allJobs){
    $filteredJobs = array();
    foreach ($allJobs as $job) {
        if (in_array($job['category'], $selectedCategories)) {
            $filteredJobs[] = $job;
        }
    }
    return $filteredJobs;
}
?>