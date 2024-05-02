<?php

namespace App\Http\Controllers\plan;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoinsFormRequest;
use App\Models\Coin;
use App\Models\User;
use Exception;

class CoinsController extends Controller
{

    /**
     * Display a listing of the coins.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $coins = Coin::with('user')->paginate(15);

        return view('coins.index', compact('coins'));
    }

    /**
     * Show the form for creating a new coin.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id','id')->all();
        
        return view('coins.create', compact('users'));
    }

    /**
     * Store a new coin in the storage.
     *
     * @param App\Http\Requests\CoinsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(CoinsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Coin::create($data);

            return redirect()->route('coins.coin.index')
                ->with('success_message', 'Coin was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified coin.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $coin = Coin::with('user')->findOrFail($id);

        return view('coins.show', compact('coin'));
    }

    /**
     * Show the form for editing the specified coin.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $coin = Coin::findOrFail($id);
        $users = User::pluck('id','id')->all();

        return view('coins.edit', compact('coin','users'));
    }

    /**
     * Update the specified coin in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\CoinsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, CoinsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $coin = Coin::findOrFail($id);
            $coin->update($data);

            return redirect()->route('coins.coin.index')
                ->with('success_message', 'Coin was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified coin from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $coin = Coin::findOrFail($id);
            $coin->delete();

            return redirect()->route('coins.coin.index')
                ->with('success_message', 'Coin was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
