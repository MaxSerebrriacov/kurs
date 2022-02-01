create or replace function selectAP() returns table
(fio varchar, role text)
as
$$
declare
begin
return query(
select ss.fio , 'Author' as Role from selectscenprem() as ss union select sss.fio, 'Producer' from selectscenproc() as sss);
end;
$$ language plpgsql;

create or replace function selectProd(namel varchar) returns table(fio varchar)
as
$$
declare
begin
return query(
select p.fio from producers as p where id in (select prodeccer_id from videotape as v where v.author_id = (select id from authors as a where a.fio = namel limit 1) group by prodeccer_id having count(author_id)>1));
end;
$$ language plpgsql;

create or replace function filmafteryear(namel varchar, year int) returns table(name varchar, year_created varchar)
as
$$
declare
begin
return query(
select v.name, v.year_created from videotape as v where prodeccer_id = (select id from producers where fio = namel limit 1) and v.year_created::INT > year);
end;
$$ language plpgsql;

create or replace function filmprem(year int) returns table(name
varchar, year_created varchar)
as
$$
declare
begin
return query(
select v.name, v.year_created from videotape as v where v.id in (select vp.videotape_id from videotape_premies as vp where vp.premie_id in (select p.id from premies as p where p.year_completed::int = year)));
end;
$$ language plpgsql;

create or replace function selectallindustry(namel varchar) returns table (id int, name varchar)
as
$$
declare
begin
return query(
select i.id, i.name from industry as i where i.id in (select v.industry_id from videotape as v where v.prodeccer_id = (select p.id from producers as p where p.fio = namel limit 1)));
end;
$$ language plpgsql;
