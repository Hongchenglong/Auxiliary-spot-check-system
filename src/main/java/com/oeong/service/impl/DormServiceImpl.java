package com.oeong.service.impl;

import com.oeong.dao.DormDao;
import com.oeong.entity.Dorm;
import com.oeong.service.DormService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class DormServiceImpl implements DormService {

    @Autowired
    private DormDao dormDao;

    @Override
    public Dorm findByDormNum(String dormNum, Integer dormGrade, String dormDep) {
        return dormDao.findByDormNum(dormNum, dormGrade, dormDep);
    }

    @Override
    public List<Integer> count(Integer dormGrade, String dormDep, String sex) {
        return dormDao.count(dormGrade, dormDep, sex);
    }

    @Override
    public Integer cnt(Integer dormGrade, String dormDep, String sex) {
        return dormDao.cnt(dormGrade, dormDep, sex);
    }

    @Override
    public List<Dorm> randomDraw(Integer grade, String dep, String sex, Integer limit) {
        return dormDao.randomDraw(grade, dep, sex, limit);
    }
}
