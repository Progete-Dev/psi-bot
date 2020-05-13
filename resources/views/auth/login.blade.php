@extends('layout')
@section('title','Login')
@section('body')
    

<style>
    body{
        background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzNTUiIGhlaWdodD0iMzU1Ij48cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJyZ2IoMTQ2LDY5LDYxKSI+PC9yZWN0PjxjaXJjbGUgY3g9IjAiIGN5PSIwIiByPSI1OS4xNjY2NjY2NjY2NjY2NjQiIGZpbGw9IiNkZGQiIG9wYWNpdHk9IjAuMDg5MzMzMzMzMzMzMzMzMzMiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjM1NSIgY3k9IjAiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iI2RkZCIgb3BhY2l0eT0iMC4wODkzMzMzMzMzMzMzMzMzMyI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iMCIgY3k9IjM1NSIgcj0iNTkuMTY2NjY2NjY2NjY2NjY0IiBmaWxsPSIjZGRkIiBvcGFjaXR5PSIwLjA4OTMzMzMzMzMzMzMzMzMzIj48L2NpcmNsZT48Y2lyY2xlIGN4PSIzNTUiIGN5PSIzNTUiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iI2RkZCIgb3BhY2l0eT0iMC4wODkzMzMzMzMzMzMzMzMzMyI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iNTkuMTY2NjY2NjY2NjY2NjY0IiBjeT0iMCIgcj0iNTkuMTY2NjY2NjY2NjY2NjY0IiBmaWxsPSIjZGRkIiBvcGFjaXR5PSIwLjA3MjAwMDAwMDAwMDAwMDAxIj48L2NpcmNsZT48Y2lyY2xlIGN4PSI1OS4xNjY2NjY2NjY2NjY2NjQiIGN5PSIzNTUiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iI2RkZCIgb3BhY2l0eT0iMC4wNzIwMDAwMDAwMDAwMDAwMSI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iMTE4LjMzMzMzMzMzMzMzMzMzIiBjeT0iMCIgcj0iNTkuMTY2NjY2NjY2NjY2NjY0IiBmaWxsPSIjMjIyIiBvcGFjaXR5PSIwLjE1Ij48L2NpcmNsZT48Y2lyY2xlIGN4PSIxMTguMzMzMzMzMzMzMzMzMzMiIGN5PSIzNTUiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iIzIyMiIgb3BhY2l0eT0iMC4xNSI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iMTc3LjUiIGN5PSIwIiByPSI1OS4xNjY2NjY2NjY2NjY2NjQiIGZpbGw9IiMyMjIiIG9wYWNpdHk9IjAuMDgwNjY2NjY2NjY2NjY2NjYiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjE3Ny41IiBjeT0iMzU1IiByPSI1OS4xNjY2NjY2NjY2NjY2NjQiIGZpbGw9IiMyMjIiIG9wYWNpdHk9IjAuMDgwNjY2NjY2NjY2NjY2NjYiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjIzNi42NjY2NjY2NjY2NjY2NiIgY3k9IjAiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iI2RkZCIgb3BhY2l0eT0iMC4xNDEzMzMzMzMzMzMzMzMzNCI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iMjM2LjY2NjY2NjY2NjY2NjY2IiBjeT0iMzU1IiByPSI1OS4xNjY2NjY2NjY2NjY2NjQiIGZpbGw9IiNkZGQiIG9wYWNpdHk9IjAuMTQxMzMzMzMzMzMzMzMzMzQiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjI5NS44MzMzMzMzMzMzMzMzIiBjeT0iMCIgcj0iNTkuMTY2NjY2NjY2NjY2NjY0IiBmaWxsPSIjZGRkIiBvcGFjaXR5PSIwLjA1NDY2NjY2NjY2NjY2NjY3Ij48L2NpcmNsZT48Y2lyY2xlIGN4PSIyOTUuODMzMzMzMzMzMzMzMyIgY3k9IjM1NSIgcj0iNTkuMTY2NjY2NjY2NjY2NjY0IiBmaWxsPSIjZGRkIiBvcGFjaXR5PSIwLjA1NDY2NjY2NjY2NjY2NjY3Ij48L2NpcmNsZT48Y2lyY2xlIGN4PSIwIiBjeT0iNTkuMTY2NjY2NjY2NjY2NjY0IiByPSI1OS4xNjY2NjY2NjY2NjY2NjQiIGZpbGw9IiMyMjIiIG9wYWNpdHk9IjAuMDQ2Ij48L2NpcmNsZT48Y2lyY2xlIGN4PSIzNTUiIGN5PSI1OS4xNjY2NjY2NjY2NjY2NjQiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iIzIyMiIgb3BhY2l0eT0iMC4wNDYiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjU5LjE2NjY2NjY2NjY2NjY2NCIgY3k9IjU5LjE2NjY2NjY2NjY2NjY2NCIgcj0iNTkuMTY2NjY2NjY2NjY2NjY0IiBmaWxsPSIjMjIyIiBvcGFjaXR5PSIwLjA4MDY2NjY2NjY2NjY2NjY2Ij48L2NpcmNsZT48Y2lyY2xlIGN4PSIxMTguMzMzMzMzMzMzMzMzMzMiIGN5PSI1OS4xNjY2NjY2NjY2NjY2NjQiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iIzIyMiIgb3BhY2l0eT0iMC4xNSI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iMTc3LjUiIGN5PSI1OS4xNjY2NjY2NjY2NjY2NjQiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iI2RkZCIgb3BhY2l0eT0iMC4xMDY2NjY2NjY2NjY2NjY2NyI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iMjM2LjY2NjY2NjY2NjY2NjY2IiBjeT0iNTkuMTY2NjY2NjY2NjY2NjY0IiByPSI1OS4xNjY2NjY2NjY2NjY2NjQiIGZpbGw9IiNkZGQiIG9wYWNpdHk9IjAuMTA2NjY2NjY2NjY2NjY2NjciPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjI5NS44MzMzMzMzMzMzMzMzIiBjeT0iNTkuMTY2NjY2NjY2NjY2NjY0IiByPSI1OS4xNjY2NjY2NjY2NjY2NjQiIGZpbGw9IiMyMjIiIG9wYWNpdHk9IjAuMDYzMzMzMzMzMzMzMzMzMzQiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjAiIGN5PSIxMTguMzMzMzMzMzMzMzMzMzMiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iI2RkZCIgb3BhY2l0eT0iMC4xMDY2NjY2NjY2NjY2NjY2NyI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iMzU1IiBjeT0iMTE4LjMzMzMzMzMzMzMzMzMzIiByPSI1OS4xNjY2NjY2NjY2NjY2NjQiIGZpbGw9IiNkZGQiIG9wYWNpdHk9IjAuMTA2NjY2NjY2NjY2NjY2NjciPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjU5LjE2NjY2NjY2NjY2NjY2NCIgY3k9IjExOC4zMzMzMzMzMzMzMzMzMyIgcj0iNTkuMTY2NjY2NjY2NjY2NjY0IiBmaWxsPSIjMjIyIiBvcGFjaXR5PSIwLjA4MDY2NjY2NjY2NjY2NjY2Ij48L2NpcmNsZT48Y2lyY2xlIGN4PSIxMTguMzMzMzMzMzMzMzMzMzMiIGN5PSIxMTguMzMzMzMzMzMzMzMzMzMiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iIzIyMiIgb3BhY2l0eT0iMC4xNSI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iMTc3LjUiIGN5PSIxMTguMzMzMzMzMzMzMzMzMzMiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iI2RkZCIgb3BhY2l0eT0iMC4xMjQwMDAwMDAwMDAwMDAwMSI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iMjM2LjY2NjY2NjY2NjY2NjY2IiBjeT0iMTE4LjMzMzMzMzMzMzMzMzMzIiByPSI1OS4xNjY2NjY2NjY2NjY2NjQiIGZpbGw9IiNkZGQiIG9wYWNpdHk9IjAuMTQxMzMzMzMzMzMzMzMzMzQiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjI5NS44MzMzMzMzMzMzMzMzIiBjeT0iMTE4LjMzMzMzMzMzMzMzMzMzIiByPSI1OS4xNjY2NjY2NjY2NjY2NjQiIGZpbGw9IiMyMjIiIG9wYWNpdHk9IjAuMDI4NjY2NjY2NjY2NjY2NjY3Ij48L2NpcmNsZT48Y2lyY2xlIGN4PSIwIiBjeT0iMTc3LjUiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iIzIyMiIgb3BhY2l0eT0iMC4wNjMzMzMzMzMzMzMzMzMzNCI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iMzU1IiBjeT0iMTc3LjUiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iIzIyMiIgb3BhY2l0eT0iMC4wNjMzMzMzMzMzMzMzMzMzNCI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iNTkuMTY2NjY2NjY2NjY2NjY0IiBjeT0iMTc3LjUiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iIzIyMiIgb3BhY2l0eT0iMC4xMzI2NjY2NjY2NjY2NjY2NSI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iMTE4LjMzMzMzMzMzMzMzMzMzIiBjeT0iMTc3LjUiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iIzIyMiIgb3BhY2l0eT0iMC4wMjg2NjY2NjY2NjY2NjY2NjciPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjE3Ny41IiBjeT0iMTc3LjUiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iIzIyMiIgb3BhY2l0eT0iMC4xMzI2NjY2NjY2NjY2NjY2NSI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iMjM2LjY2NjY2NjY2NjY2NjY2IiBjeT0iMTc3LjUiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iIzIyMiIgb3BhY2l0eT0iMC4xMzI2NjY2NjY2NjY2NjY2NSI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iMjk1LjgzMzMzMzMzMzMzMzMiIGN5PSIxNzcuNSIgcj0iNTkuMTY2NjY2NjY2NjY2NjY0IiBmaWxsPSIjZGRkIiBvcGFjaXR5PSIwLjEyNDAwMDAwMDAwMDAwMDAxIj48L2NpcmNsZT48Y2lyY2xlIGN4PSIwIiBjeT0iMjM2LjY2NjY2NjY2NjY2NjY2IiByPSI1OS4xNjY2NjY2NjY2NjY2NjQiIGZpbGw9IiMyMjIiIG9wYWNpdHk9IjAuMTE1MzMzMzMzMzMzMzMzMzQiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjM1NSIgY3k9IjIzNi42NjY2NjY2NjY2NjY2NiIgcj0iNTkuMTY2NjY2NjY2NjY2NjY0IiBmaWxsPSIjMjIyIiBvcGFjaXR5PSIwLjExNTMzMzMzMzMzMzMzMzM0Ij48L2NpcmNsZT48Y2lyY2xlIGN4PSI1OS4xNjY2NjY2NjY2NjY2NjQiIGN5PSIyMzYuNjY2NjY2NjY2NjY2NjYiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iIzIyMiIgb3BhY2l0eT0iMC4wOTgiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjExOC4zMzMzMzMzMzMzMzMzMyIgY3k9IjIzNi42NjY2NjY2NjY2NjY2NiIgcj0iNTkuMTY2NjY2NjY2NjY2NjY0IiBmaWxsPSIjZGRkIiBvcGFjaXR5PSIwLjE0MTMzMzMzMzMzMzMzMzM0Ij48L2NpcmNsZT48Y2lyY2xlIGN4PSIxNzcuNSIgY3k9IjIzNi42NjY2NjY2NjY2NjY2NiIgcj0iNTkuMTY2NjY2NjY2NjY2NjY0IiBmaWxsPSIjZGRkIiBvcGFjaXR5PSIwLjEwNjY2NjY2NjY2NjY2NjY3Ij48L2NpcmNsZT48Y2lyY2xlIGN4PSIyMzYuNjY2NjY2NjY2NjY2NjYiIGN5PSIyMzYuNjY2NjY2NjY2NjY2NjYiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iI2RkZCIgb3BhY2l0eT0iMC4xNDEzMzMzMzMzMzMzMzMzNCI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iMjk1LjgzMzMzMzMzMzMzMzMiIGN5PSIyMzYuNjY2NjY2NjY2NjY2NjYiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iI2RkZCIgb3BhY2l0eT0iMC4xMDY2NjY2NjY2NjY2NjY2NyI+PC9jaXJjbGU+PGNpcmNsZSBjeD0iMCIgY3k9IjI5NS44MzMzMzMzMzMzMzMzIiByPSI1OS4xNjY2NjY2NjY2NjY2NjQiIGZpbGw9IiNkZGQiIG9wYWNpdHk9IjAuMTQxMzMzMzMzMzMzMzMzMzQiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjM1NSIgY3k9IjI5NS44MzMzMzMzMzMzMzMzIiByPSI1OS4xNjY2NjY2NjY2NjY2NjQiIGZpbGw9IiNkZGQiIG9wYWNpdHk9IjAuMTQxMzMzMzMzMzMzMzMzMzQiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjU5LjE2NjY2NjY2NjY2NjY2NCIgY3k9IjI5NS44MzMzMzMzMzMzMzMzIiByPSI1OS4xNjY2NjY2NjY2NjY2NjQiIGZpbGw9IiNkZGQiIG9wYWNpdHk9IjAuMTA2NjY2NjY2NjY2NjY2NjciPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjExOC4zMzMzMzMzMzMzMzMzMyIgY3k9IjI5NS44MzMzMzMzMzMzMzMzIiByPSI1OS4xNjY2NjY2NjY2NjY2NjQiIGZpbGw9IiMyMjIiIG9wYWNpdHk9IjAuMDQ2Ij48L2NpcmNsZT48Y2lyY2xlIGN4PSIxNzcuNSIgY3k9IjI5NS44MzMzMzMzMzMzMzMzIiByPSI1OS4xNjY2NjY2NjY2NjY2NjQiIGZpbGw9IiMyMjIiIG9wYWNpdHk9IjAuMDgwNjY2NjY2NjY2NjY2NjYiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjIzNi42NjY2NjY2NjY2NjY2NiIgY3k9IjI5NS44MzMzMzMzMzMzMzMzIiByPSI1OS4xNjY2NjY2NjY2NjY2NjQiIGZpbGw9IiMyMjIiIG9wYWNpdHk9IjAuMDgwNjY2NjY2NjY2NjY2NjYiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjI5NS44MzMzMzMzMzMzMzMzIiBjeT0iMjk1LjgzMzMzMzMzMzMzMzMiIHI9IjU5LjE2NjY2NjY2NjY2NjY2NCIgZmlsbD0iI2RkZCIgb3BhY2l0eT0iMC4wNzIwMDAwMDAwMDAwMDAwMSI+PC9jaXJjbGU+PC9zdmc+');background-repeat:-repeat;
  
   }
</style>
      <div class="container mt-4 px-4 ">
        <div class="flex content-center items-center justify-center h-full">
          <div class="w-full lg:w-2/5 px-0">
            <div
              class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0"
            >
              <div class="rounded-t mb-0 px-6 py-6">
                <div class="text mb-3">
                  <h6 class="text-gray-600 text-sm font-bold">Entrar com:</h6>
                </div>
                <div class="btn-wrapper text-center mb-4">
                    <button
                      class="bg-red-600 hover:bg-red-800 text-white  py-2 px-4 rounded inline-flex items-center"
                    >
                    <span>Google</span>
                  </button>
                </div>
                <hr class="mx-6 border-b-1 border-gray-400" />
              </div>
              <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <div class="text-gray-500 text-center mb-3 font-bold">
                  <small>Ou entre com suas credenciais:</small>
                </div>
                <form>
                  <div class="relative w-full mb-3">
                    <label
                      class="block uppercase text-gray-700 text-xs font-bold mb-2"
                      for="grid-password"
                    >
                      Email
                    </label>
                    <input
                      type="email"
                      class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                      placeholder="Email"
                      style="transition: all 0.15s ease 0s;"
                    />
                  </div>
                  <div class="relative w-full mb-3">
                    <label
                      class="block uppercase text-gray-700 text-xs font-bold mb-2"
                      for="grid-password"
                    >
                      Senha
                    </label>
                    <input
                      type="password"
                      class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                      placeholder="Senha"
                      style="transition: all 0.15s ease 0s;"
                    />
                  </div>
                  <div>
                    <label class="inline-flex items-center cursor-pointer">
                      <input
                        id="customCheckLogin"
                        type="checkbox"
                        class="form-checkbox text-gray-800 ml-1 w-5 h-5"
                        style="transition: all 0.15s ease 0s;"
                      />
                      <span class="ml-2 text-sm font-semibold text-gray-700">
                        Lembrar-se de mim
                      </span>
                    </label>
                  </div>
                  <div class="text-center mt-6">
                    <button
                      class="bg-green-500 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                      type="button"
                      style="transition: all 0.15s ease 0s;"
                    >
                      Entrar
                    </button>
                  </div>
                  <div class="btn-wrapper text-center">
                    <button
                      class="bg-purple-400 hover:bg-purple-800 active:bg-gray-100 text-white font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center text-xs"
                      type="button"
                      style="transition: all 0.15s ease 0s;"
                    >
                      Esqueceu a senha?
                    </button>
                    <button
                      class="bg-pink-400 hover:bg-pink-800 active:bg-gray-100 text-white font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center text-xs"
                      type="button"
                      style="transition: all 0.15s ease 0s;"
                    >
                      Criar nova conta
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection
