SELECT (SELECT
            COUNT(`occ_income`.`occ_income_id`) 
        FROM
            `occ_income`,
            `occupation`,
            `occ_group`
        WHERE 
                    `occ_income`.`occupation_id` = `occupation`.`occupation_id` 
                AND 
                    `occupation`.`occ_group_id` = `occ_group`.`occ_group_id` 
                AND 
                    `occ_group`.`occ_branch_id` = 1) AS "Esnaf Count",
        (SELECT
            COUNT(`occ_income`.`occ_income_id`)
        FROM 
            `occ_income`) AS "Total Count",
        (SELECT
            COUNT(`occ_income`.`occ_income_id`) 
        FROM
            `occ_income`,
            `occupation`,
            `occ_group`
        WHERE 
                    `occ_income`.`occupation_id` = `occupation`.`occupation_id` 
                AND 
                    `occupation`.`occ_group_id` = `occ_group`.`occ_group_id` 
                AND 
                    `occ_group`.`occ_branch_id` = 1) /
        (SELECT
            COUNT(`occ_income`.`occ_income_id`)
        FROM 
            `occ_income`) * 100 AS "Esnaf %"
FROM
    DUAL


    