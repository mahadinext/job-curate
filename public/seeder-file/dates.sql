INSERT INTO dates (`date_value`, `day_number`, `day_name`, `month_number`, `month_name`, `year_number`)
SELECT
    date_table.date_value,
    EXTRACT(DOW FROM date_table.date_value) AS day_number,
    TO_CHAR(date_table.date_value, 'Day') AS day_name,
    EXTRACT(MONTH FROM date_table.date_value) AS month_number,
    TO_CHAR(date_table.date_value, 'Month') AS month_name,
    EXTRACT(YEAR FROM date_table.date_value) AS year_number
FROM
    (SELECT
        generate_series('2022-01-01'::date, '2023-12-31'::date, '1 day'::interval)::date AS date_value
    ) AS date_table;
