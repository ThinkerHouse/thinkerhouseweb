package com.thinkerhouse.co.services;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.userdetails.User;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.stereotype.Service;

import com.thinkerhouse.co.entities.Users;
import com.thinkerhouse.co.repo.UsersRepo;

@Service
public class CustomUserDetailsService implements UserDetailsService {

	@Autowired
	private UsersRepo usersRepo;
	
	@Autowired
	UserService userService;

	@Override
	public UserDetails loadUserByUsername(String username) throws UsernameNotFoundException {
//		final Users user = usersRepo.findByUsername(username);
		final Users user = userService.findUserByUser(username);
		
		
		if (user == null) {
			throw new UsernameNotFoundException(" This user not found in our database!");
		}
		
		UserDetails userDetails = User.withUsername(user.getUsername()).password(user.getPassword()).build();
		
		return userDetails;
	}

}
