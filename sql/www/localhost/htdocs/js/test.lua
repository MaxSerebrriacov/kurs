local m = {}

function m.parse(txt)
local t = {}

while txt:len() > 0 do
local i = txt.find('&')
if i == nil then
i = txt:len()+1
end

local p = txtx:sub(1, i -1)
