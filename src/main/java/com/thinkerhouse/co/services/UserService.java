package com.thinkerhouse.co.services;

import java.util.List;

import com.thinkerhouse.co.entities.Users;

public interface UserService {

	public List<Users> getUsers();
	public Users findUserById(int idUser);
	public Users findUserByUser(String username);
	public Users addUsers(Users users);
	public Users updateUsers(Users users);
	public void deleteUsers(int idUser);
	public long countUsers();
}
