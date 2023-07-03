<?php

use Illuminate\Support\Carbon;

function Res($message, $data, $code)
{
    return response(['message' => $message, 'data' => $data], $code);
}

function Search($request, $query, $fn)
{
    if ($request->has('like')) {
        foreach ($request->like as $key => $val) {
            $query = $query->where($key, 'LIKE', '%' . $val . '%');
        }
    }


    if ($request->has('likeOr')) {
        foreach ($request->likeOr as $key => $val) {
            $query = $query->orWhere($key, 'LIKE', '%' . $val . '%');
        }
    }

    if ($request->has('where')) {
        foreach ($request->where as $key => $val) {
            $query = $query->where($key, $val);
        }
    }

    if ($request->has('whereOr')) {
        foreach ($request->whereOr as $key => $val) {
            $query = $query->orWhere($key, $val);
        }
    }

    if ($request->has('sort') && $request->sort['field'] && $request->sort['order']) {
        $query = $query->orderBy($request->sort['field'], $request->sort['order']);
    }

    if ($request->has('date')) {
        $from = date(Carbon::parse($request->date['from'])
        ->toDateTimeString());
        $to = date(Carbon::parse($request->date['to'])->addDays(1)
        ->toDateTimeString());

        $query = $query->whereBetween('created_at', [$from, $to]);
    }

    if ($fn) {
        $query = $fn($query);
    }

    if ($request->allPage == true) {

        if($request->has('filters'))
        {
            $query = $query->get($request->filters);
        }
        else
        {
            $query = $query->get();

        }

    } else {
        if ($request->has('perPage')) {
            if($request->perPage == -1) {
                $query = $query->paginate($query->count());
            } else {
                $query = $query->paginate($request->perPage);
            }
        } else {
            $query = $query->paginate(10);
        }
    }
    return $query;
}
