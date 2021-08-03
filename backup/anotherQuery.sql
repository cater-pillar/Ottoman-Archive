SELECT
    occ_group.name,
    COUNT(occ_income.occ_income_id) AS "Number of households"
FROM
    mahalle,
    household,
    occ_income,
    occupation,
    occ_group
WHERE  
    occ_income.occupation_id = occupation.occupation_id AND
    occ_income.household_id = household.household_id AND
    occupation.occ_group_id = occ_group.occ_group_id AND 
    mahalle.name = "Yagodin Mahallesi" AND
    household.mahalle_id = mahalle.mahalle_id
GROUP BY
    occ_group.name