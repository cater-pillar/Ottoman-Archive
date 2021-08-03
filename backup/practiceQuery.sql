CREATE FUNCTION get_occ_group(occ_name VARCHAR(25))
RETURNS VARCHAR(15)
BEGIN
    RETURN (
        SELECT
            `occ_group`.`name`
        FROM
            `occ_group`
        WHERE
            `occupation`.`name` = occ_name AND
            `occupation`.`occ_group_id` = `occ_group`.`occ_group_id`
    );
END

CREATE DEFINER = `admin`@`localhost` FUNCTION get_occupation_name(occupation_id INT(11))
RETURNS VARCHAR(25)
BEGIN
    RETURN (SELECT occupation.name FROM occupation WHERE occupation.occupation_id = occupation_id);
END