
create or replace function selectscenprem() 
returns table (FIO varchar(256))
language plpgsql
as
$$
declare
countauthfilm int;
countpremfilm int;
countauthors int;
begin
select count(*) from authors into countauthors;

while(countauthors != 0)
loop
select distinct count(*) from videotape where author_id = countauthors into countauthfilm;
select distinct count(*) from videotape where author_id = countauthors and id in (select videotape_id from videotape_premies) into countpremfilm;
if(countauthfilm = countpremfilm) then
return query
(
select a.fio from authors as a where id = (select distinct author_id from videotape where author_id = countauthors and id in (select videotape_id from videotape_premies )limit 1)
);
end if;

countauthors = countauthors -1;
end loop;
end;
$$;




create or replace function selectscenproc() 
returns table (FIO varchar(256))
language plpgsql
as
$$
declare
countprocfilm int;
countpremfilm int;
countproc int;
begin
select count(*) from authors into countproc;

while(countproc != 0)
loop
select distinct count(*) from videotape where prodeccer_id = countproc into countprocfilm;
select distinct count(*) from videotape where prodeccer_id = countproc and id in (select videotape_id from videotape_premies) into countpremfilm;
if(countprocfilm = countpremfilm) then
return query
(
select p.fio from producers as p where id = (select distinct prodeccer_id from videotape where prodeccer_id = countproc and id in (select videotape_id from videotape_premies )limit 1)
);
end if;

countproc = countproc -1;
end loop;
end;
$$;








